<?php

namespace app\admin\controller;
use app\admin\model\UserModel;
use think\Cache;
use think\Db;

class User extends Base
{
    /**
     * 用户列表
     */
    public function index(){

        $key = input('key');
        $map['is_del'] = 0; //config('code.is_del')['no'];//0未删除，1已删除
        if($key && $key !== "")
        {
            $map['username|nick|mobile|email'] = ['like',"%" . $key . "%"];
        }
        $user = new UserModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $user->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $user->getUserByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        //print_r($lists);exit;
        foreach($lists as $k=>$v)
        {
            $lists[$k]['create_time']=date('Y-m-d H:i:s',$v['create_time']);
        }
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * 添加用户
     */
    public function addUser()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $param['password'] = md5(md5($param['password']) . config('auth_key'));
            $param['create_time'] = time();
            $member = new UserModel();
            $flag = $member->insertUser($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
    }


    /**
     * 编辑用户
     */
    public function editUser()
    {
        $user = new UserModel();
        if(request()->isAjax()){
            $param = input('post.');
            if(empty($param['password'])){
                unset($param['password']);
            }else{
                $param['password'] = md5(md5($param['password']) . config('auth_key'));
            }
            $flag = $user->editUser($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $info = Db::name('user')->where('id',$id)->find();
        $this->assign('user' , $info);
        return $this->fetch();
    }


    /**
     * 删除用户
     * @author [极客] [505413@qq.com]
     */
    public function delUser() {

        try {
            $id = input('param.id');
            $user_model = new UserModel();
            $flag = $user_model->delUser($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除用户',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }



    /**
     * 用户状态
     */
    public function userStatus()
    {
        try {
            $id = input('param.id');

            $user_model = new UserModel();
            $where['id'] = $id;
            //获取当前记录信息
            $user = $user_model->getOneUser($where);
            if ($user['status'] == 1){//config('code.user_status')['pass']) {
                $flag = $user_model->updateStatus($where, 0 );//config('code.user_status')['ban']);
                if($flag['code'] != 1) {
                    writelog(0, '修改用户状态',"修改用户{$user['username']}状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改用户状态',"禁用用户【{$user['username']}】成功。");
                return ajaxRetrun(1,'禁用成功');
            } else {
                $flag = $user_model->updateStatus($where, 1 );//config('code.user_status')['pass']);
                if($flag['code'] != 1) {
                    writelog(0, '修改用户状态',"修改用户【{$user['username']}】状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改用户状态',"开启用户【{$user['username']}】成功。");
                return ajaxRetrun(2,'开启成功');
            }
            return json($flag);
        } catch (\Exception $e) {
            writelog(-1, '修改用户状态',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }

}