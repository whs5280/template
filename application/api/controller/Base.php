<?php

namespace app\api\controller;
use think\Controller;
use think\Model;
use think\Db;


class Base extends Controller
{

    public function _initialize ()
    {
        parent::_initialize ();

//        //如有权限验证 加入权限验证
        $post = input('post.');
        $token = isset($post['token']) ? $post['token'] : '';
//         if (!password_verify('yyxg', $token)) return 'token验证失败'; //604800

        $where['id'] = 1;
        $data = Db::name('token')->where($where)->find();
        //判断token是否过期
        if($data['create_time']+604800<time()){
            $data['token'] = $this->token();
            $inData['token'] = $data['token'];
            $inData['create_time'] = time();
            Db::name('token')->where($where)->update($inData);
            echo json_encode(['msg'=>'请求失败token过期']);
            exit;
        }
        if ($token !=$data['token']){
            echo json_encode(['msg'=>'请求失败token错误']);
            exit;
        }

    }
    //生成token
    public function token(){
        $token = '';
        for($i = 0; $i < 100; $i++){
            $string = 'abcdefghijklmnopqrstuvwsyz1234567890/*-+!@#$%^&()=?><:;~ABCDEFGHIJKLMNOPQRSTUVWSYZ';
            $token= substr($string,rand(0,81),1).$token;
        }
        return $token;
    }
}