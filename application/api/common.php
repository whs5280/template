<?php
use think\Db;

/**
 * 验证必要字段是否缺失或为空.
 * @param array $required_fields 需要验证的必要字段
 * @param array $request_params 实际传来的参数
 * @param array $array  接收的数组
 * @return string/json
 */
function verifyRequiredParams($required_fields,$request_params=array()) {
    $error = false;
    $error_fields = "";
    if(!$request_params){
        $request_params = input();
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
    //字段不存在或则为空
    if ($error) {
        return echoResponse(-301,'必要字段'.substr($error_fields,0,-2).'缺失或者为空');
    }

}




/**
 * 检查密码格式是否正确
 */
function check_pwd($pwd)
{
    return $result = preg_match("/^[0-9a-zA-Z*._]{6,50}$/",$pwd);

}

/*
    * Password hashing with PBKDF2.
    * Author: havoc AT defuse.ca
    * www: https://defuse.ca/php-pbkdf2.htm
    */
function create_hash($password)
{
    // format: algorithm:iterations:salt:hash
    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTES, MCRYPT_DEV_URANDOM));
    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" .
        base64_encode(pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $password,
            $salt,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTES,
            true
        ));
}

/**
 * @param $date Y-m-d或者YY-m-d H:i:s
 * @return int
 */
function date_to_int($date) {
    if(strlen($date) == 19){
        $date_time = explode(" ", $date);
        $date = explode("-",$date_time[0]);
        $time = explode(":",$date_time[1]);
    }else{
        $date = explode("-", $date);
        $time = explode(":", "00:00:00");
    }
    $time = mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
    return $time;
}

/**
 * 生成唯一的token
 * @return string
 */
function make_token(){
    return md5(uniqid(md5(microtime(true)), true));
}

/**
 * 记录日志
 * @param  [type] $uid         [用户id]
 * @param  [type] $username    [用户名]
 * @param  [type] $description [描述]
 * @param  [type] $status      [状态]
 * @return [type]              [description]
 */
function writelog($status, $title, $description = '')
{

    $data['admin_id'] = session('uid');
    $data['admin_name'] = session('username');
    $data['title'] = $title;
    $data['description'] = $description;
    $data['status'] = $status;
    $data['ip'] = request()->ip();
    $data['add_time'] = time();
    $log = Db::name('Log')->insert($data);

}

//返回格式
function returnAjax($code,$msg,$data=[]){
    return json(['resultCode'=>$code,'resultMsg'=>$msg,'resultData'=>$data]);
}

//对象转数组
function objtoarr($obj){
    $ret = array();
    foreach($obj as $key =>$value){
        if(gettype($value) == 'array' || gettype($value) == 'object'){
            $ret[$key] = objtoarr($value);
        }else{
            $ret[$key] = $value;
        }
    }
    return $ret;
}

function getOpenid($code){
    $appId = 'wxec11e3261a4b84f8';
    $secret = 'f1bf5f690bcbf4987e06c29b46135904';
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appId."&secret=".$secret."&js_code=".$code."&grant_type=authorization_code";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    $output = curl_exec($ch);
    curl_close($ch);
    $content = json_decode($output);
    $content_arr = objtoarr($content);
    return $content_arr;
}

// 前端接口
// 失败返回 无json()
function e($msg = '', $code = 0)
{
    return ['msg'=>$msg, 'code'=>$code];
}
// 成功返回 无json()
function s($data = [], $code = 1)
{
    return ['data'=>$data, 'code'=>$code];
}
// redis hget 数组
function r_hget($name, $key)
{
    return json_decode(r()->hget($name, $key), true);
}



