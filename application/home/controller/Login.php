<?php

namespace app\home\controller;
use app\admin\model\UserType;
use app\common\lib\IAuth;
use app\common\model\UserLikesModel;
use app\common\model\UserModel;
use think\Controller;
use think\Db;
use org\Verify;
use com\Geetestlib;

class Login extends Controller
{

    /**
     * 登录页面
     * @return
     */
    public function index()
    {
        return $this->fetch('/login');
    }


    /**
     * 登录操作
     * @return
     */
    public function doLogin()
    {
        $account = input("param.username");
        $password = input("param.password");
        $code = input("param.code");

        $result = $this->validate(compact('account', 'password'), 'UserValidate.login');
        if(true !== $result){
            return json(['code' => -5, 'url' => '', 'msg' => $result]);
        }

        //验证验证码
        $verify = new Verify();
        if (!$code) {
            return json(['code' => -4, 'url' => '', 'msg' => '请输入验证码']);
        }
        if (!$verify->check($code)) {
            return json(['code' => -4, 'url' => '', 'msg' => '验证码错误']);
        }

        $user_model = new UserModel();
        $where = [
            'account'   =>  $account,
            'password'  => IAuth::setPassword($password)
        ];
        $user = $user_model->getOneUser($where);
        if(!$user){
            return json(['code' => -1, 'msg' => '帐号或密码错误']);
        }

        if($user['status'] == config('code.user_status')['ban']){
            return json(['code' => -1, 'url' => '', 'msg' => '该账号被禁用']);
        }
        if($user['is_del'] == config('code.is_del')['yes']){
            return json(['code' => -1, 'url' => '', 'msg' => '该账号被注销']);
        }
        
        session('uid', $user['id']);         //用户ID
        session('account', $user['account']);  //用户名
        session('nickname', $user['nickname']);  //用户名
        session('head_img', $user['head_img']); //用户头像
  
        //更新用户信息
        $param = [
            'login_num' => $user['login_num'] + 1,
            'last_login_ip' => request()->ip(),
            'last_login_time' => time(),
            //'token' => IAuth::setToken($account)
        ];

        $user_model->updateUser(['id'=>$user['id']],$param);
        return json(['code' => 1, 'url' => url('index/index'), 'msg' => '登录成功！']);
    }


    /**
     * 验证码
     * @return
     */
    public function checkVerify()
    {
        $verify = new Verify();
        $verify->imageH = 40;
        $verify->imageW = 150;
		$verify->codeSet = '0123456789';
        $verify->length = 4;
        $verify->useNoise = false;
        $verify->fontSize = 20;
        return $verify->entry();
    }


    /**
     * 退出登录
     * @return
     */
    public function loginOut()
    {
        session(null);
        $this->redirect('login/index');
    }
}