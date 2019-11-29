<?php

namespace app\api\controller;
use app\admin\model\PrivatesOrderModel;
use app\common\lib\IAuth;
use think\Controller;
use think\Db;
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Privates extends Base
{
    public function order(){
        $privates = new PrivatesOrderModel();
        $post = input('post.');
        $post['order_num'] = date("Ymd").$this->orderNum();
        $post['create_time'] = time();
        $fag = $privates->insertData($post);
        array_key_exists('user_id',$post)?$key='已注册用户':$key='未注册用户';
        if($fag){
            return returnAjax(1,$key.'生成订单成功',[]);
        }
        return returnAjax(0,$key.'生成订单失败',[]);
    }
    //生成token
    public function orderNum(){
        $data = '';
        for($i = 0; $i < 20; $i++){
            $string = 'abcdefghijklmnopqrstuvwsyz1234567890ABCDEFGHIJKLMNOPQRSTUVWSYZ';
            $data= substr($string,rand(0,81),1).$data;
        }
        return $data;
    }
}