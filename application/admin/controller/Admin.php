<?php

namespace app\admin\controller;
use app\admin\model\AdminModel;
use app\admin\model\AdminType;
use think\Db;

class Admin extends Base
{
    /**
     * [index 用户列表]
     * @return [type] [description]
     * @author [cjj]
     */
    public function index(){

        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['username'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('admin')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $admin = new AdminModel();
        $lists = $admin->getAdminsByWhere($map, $Nowpage, $limits);
        foreach($lists as $k=>$v)
        {
            $lists[$k]['last_login_time']=date('Y-m-d H:i:s',$v['last_login_time']);
        }    
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * [adminAdd 添加用户]
     * @return [type] [description]
     * @author [cjj]
     */
    public function adminAdd()
    {
        if(request()->isAjax()){
            $param = input('post.');
            $param['password'] = md5(md5($param['password']) . config('auth_key'));
            $admin = new AdminModel();
            $flag = $admin->insertAdmin($param);

            $accdata = array(
                'uid'=> $admin['id'],
                'group_id'=> $param['groupid'],
            );

            $group_access = Db::name('auth_group_access')->insert($accdata);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $role = new AdminType();
//        $wechatUserModel = new WeChatUserModel();
        $adminModel = new AdminModel();
//        $wuid1 = $adminModel->column('wechatUser_id');
//        $wuid2 = $wechatUserModel->column('id');
//        $wuid = array_diff($wuid2,$wuid1);
//        dump($wuid);die;
//        $this->assign('wechatUsers',$wechatUserModel->where([
//            'id' => ['in',$wuid]
//        ])->select());
        $this->assign('role',$role->getRole());

        return $this->fetch();
    }


    /**
     * [AdminEdit 编辑用户]
     * @return [type] [description]
     * @author [cjj]
     */
    public function adminEdit()
    {
        $admin = new AdminModel();

        if(request()->isAjax()){
            $param = input('post.');
            if(empty($param['password'])){
                unset($param['password']);
            }else{
                $param['password'] = md5(md5($param['password']) . config('auth_key'));
            }
            $flag = $admin->editAdmin($param);
            $group_access = Db::name('auth_group_access')->where('uid', $admin['id'])->update(['group_id' => $param['groupid']]);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');


        $role = new AdminType();
        $user = $admin->getOneAdmin($id);
        $this->assign([
          'user' => $user,
            'role' => $role->getRole()
        ]);
//        $wechatUserModel = new WeChatUserModel();
//        $adminModel = new AdminModel();
//        $wuid1 = $adminModel->column('wechatUser_id');
//        $wuid2 = $wechatUserModel->column('id');
//        $wuid = array_diff($wuid2,$wuid1);
//        array_push($wuid,$user['wechatUser_id']);
//        dump($wuid);die;
//        $this->assign('wechatUsers',$wechatUserModel->where([
//            'id' => ['in',$wuid]
//        ])->select());
        return $this->fetch();
    }


    /**
     * [AdminDel 删除用户]
     * @return [type] [description]
     * @author [cjj]
     */
    public function adminDel()
    {
        $id = input('param.id');
        $role = new AdminModel();
        $flag = $role->delAdmin($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }



    /**
     * [adminstate 用户状态]
     * @return [type] [description]
     * @author [cjj]
     */
    public function admin_state()
    {
        $id = input('param.id');
        $status = Db::name('admin')->where('id',$id)->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('admin')->where('id',$id)->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('admin')->where('id',$id)->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }

}