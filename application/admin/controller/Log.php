<?php

namespace app\admin\controller;
use app\admin\model\LogModel;
use think\Db;
use com\IpLocation;
 
class Log extends Base
{

    /**
     * [operate_log 操作日志]
     * @return [type] [description]
     * @author [cjj]
     */
    public function operate_log()
    {
        //获取过滤条件
        $description = input('search_description');
        $start_date = input('start');
        $end_date = input('end');
        $admin = input('search_admin');
        $map = [];
        if($admin&&$admin!==""){
            $map['admin_id'] =  $admin;
        }
        if (isset($description) && trim($description) != '') {
            $map['description'] = ['like','%' . $description . '%'];
        }
        if (isset($start_date) && trim($start_date) != '') {
            $map['add_time'] = ['>=',strtotime($start_date)];
        }
        if (isset($end_date) && trim($end_date) != '') {
            $map['add_time'] = ['<=',strtotime($end_date)];
        }
        if(isset($start_date) && trim($start_date) != '' && isset($end_date) && trim($end_date) != ''){
            $map['add_time'] = ['between',[strtotime($start_date),strtotime($end_date)]];
        }
        $arr=Db::name("admin")->column("id,username"); //获取用户列表      
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('log')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = Db::name('log')->where($map)->page($Nowpage, $limits)->order('add_time desc')->select();
        $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        foreach($lists as $k=>$v){
            $lists[$k]['add_time']=date('Y-m-d H:i:s',$v['add_time']);
            $lists[$k]['ipaddr'] = $Ip->getlocation($lists[$k]['ip']);
        }  
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('count', $count);
        $this->assign("search_user",$arr);
        $this->assign([
            'search_admin'=> $admin,
            'search_description'=> $description,
            'start'=> $start_date,
            'end'=> $end_date
        ]);
        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * [del_log 删除日志]
     * @return [type] [description]
     * @author [cjj]
     */
    public function del_log()
    {
        $id = input('param.id');
        $log = new LogModel();
        $flag = $log->delLog($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
 
}