<?php

namespace app\api\controller;
use app\common\lib\Aes;
use app\common\lib\exception\ApiException;
use app\common\lib\IAuth;
use app\common\lib\Time;
use app\common\model\UserModel;
use think\Cache;
use think\Controller;
use \Firebase\JWT\JWT;
use think\Db;



/**
 * API模块公共的控制器
 * 1、校验每次接口请求的合法性（接口安全）
 * 2、校验用户token
 * 3、等等
 * Class User
 * @package app\api\controller
 */
class Common extends Controller
{


    public function token(){
        $token = Db::name('token')->find();
        return $token;
    }
}