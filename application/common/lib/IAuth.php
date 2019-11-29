<?php
/**
 * Created by PhpStorm.
 * User: cjj
 * Date: 19-3-10
 * Time: 下午2:31
 */

namespace app\common\lib;
use app\common\lib\Aes;
use think\Cache;

class IAuth {
    /**
     * 加密密码
     * @param $password
     * @return string
     */
    public static function setPassword($password){
        return md5(md5($password).config('app.password_pre_halt'));
    }

    /**
     * 生成每次API请求的sign
     * @param array $data
     * @return string
     */
    public static function setSign($data = []){
        //1、按字段排序
        ksort($data);
        //2、按&拼接字符串数据
        $str = http_build_query($data);
        //3、通过aes加密
        $Aes = new Aes();
        $string = $Aes->encrypt($str);
        //完成返回加密后的字符串
        return $string;
    }

    /**
     * 校验sign是否正确
     * @param string $sign
     * @param $data
     * @return bool
     */
    public static function checkSignPass($headers){
        //sign解密
        $Aes = new Aes();
        $str = $Aes->decrypt($headers['sign']);
        if(empty($str)){
            return false;
        }
        // version=1.1&did=uad360&app_type=android&time=111111
        parse_str($str,$arr);
        $data = [
            'version'   => $headers['version'],
            'app-type'   => $headers['app-type'],
            'device-id'   => $headers['device-id'],
            'time'      => $headers['time'],
        ];
        if(!is_array($arr) || $arr != $data){
            return false;
        }
        //校验请求时间
        if((time() - ceil($arr['time'] / 1000)) > config('app.app_sign_time')){//生成的sign N秒内有效
            return false;
        }
        //校验sign唯一(只能用一次)
        if(Cache::get($headers['sign'])){
            return false;
        }
        return true;
    }

    /**
     * 生成用户token
     * @param $account
     * @return string
     */
    public static function setToken($account) {
        return md5(uniqid(md5(microtime(true)), true).$account);
    }
}