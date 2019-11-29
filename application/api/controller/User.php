<?php

namespace app\api\controller;

use app\admin\model\UserModel;

use think\Controller;
use think\Db;

class User extends Base
{
    //登入
    public function login(){
        $userModel = new UserModel();
        $post = input('post.');
        $where['username'] = $post['username'];
        $data = $userModel->field('*')->where($where)->find();
        //过滤数据

        if($data['password'] != md5($post['password']) ){
            return returnAjax(0,'login fail，密码或用户名错误',[]);
        }
        return returnAjax(1,'login successful',$data);
    }
    //注册
    public function register(){
        $userModel = new UserModel();
        $post = input('post.');
        //获取密码并验证
        $where['username'] = $post['username'];
        $password = $userModel->field('password')->where($where)->find();
        if($password){
            return returnAjax(0,'用户已经存在',[]);
        }
        $post['password'] = md5($post['password']);
        $post['create_time'] = time();
        $post['head_url'] = '/uploads/head_img/headimg.jpg';
        //数据插入
        $fag = $userModel->insertUser($post);
        if($fag){
            return returnAjax(1,'registration success！',[]);
        }
        return returnAjax(0,'registration fail！',[]);
    }
    //发短信
    public function send_code(){
            $post   = input('post.');
            $mobile = isset($post['mobile']) ? $post['mobile'] : '';
            $code = rand(1111, 9999);
            session('code',$code);
            $result = sendSms($mobile,$code);
            return returnAjax(1,$result);
    }
}