<?php

namespace app\admin\controller;
use app\admin\model\PrivatesOrderModel;
use think\Cache;
use think\Db;

class Privates extends Base
{


    /**
     * 详情
     */
    public function Content_details()
    {
        $private = new PrivatesOrderModel();
        $id = input('param.id');
        $where['c.id']=$id;
        $info = $private->getOneOrder($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }

    /*
     *
     *
     * 私人订单
     *
     *
     *
     * */
    public function order_index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['u.email|u.username|u.mobile|u.nick'] = ['like',"%" . $key . "%"];
        }
        $order = new PrivatesOrderModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $order->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $order->getOrderByWhere($map, $Nowpage, $limits);
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
     * 删除
     */
    public function delOrder() {

        try {
            $id = input('param.id');
            $order = new PrivatesOrderModel();
            $flag = $order->delOrder($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除类型',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
}