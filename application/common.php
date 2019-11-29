<?php
use think\Db;
use Aliyun\Core\Config;  
use Aliyun\Core\Profile\DefaultProfile;  
use Aliyun\Core\DefaultAcsClient;  
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
/**
 * API，返回json数据
 * @param int $Code 状态码
 * @param string $Message 反馈信息
 * @param array $Data 返回数据
 * @return string json数据
 * @time 2018/02/24
 */
function echoResponse($Code,$Message,$Data=[],$httpCode=200) {
    $data = array(
        'resultCode' => (string)$Code,
        'resultMsg' => $Message,
        'resultData' => $Data,
    );
    return json($data,$httpCode);
}

/**
 * 字符串截取，支持中文和其他编码
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr"))
		$slice = mb_substr($str, $start, $length, $charset);
	elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str, $start, $length, $charset);
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("", array_slice($match[0], $start, $length));
	}
	return $suffix ? $slice . '...' : $slice;
}



/**
 * 读取配置
 * @return array 
 */
function load_config(){
    $list = Db::name('config')->select();
    $config = [];
    foreach ($list as $k => $v) {
        $config[trim($v['name'])]=$v['value'];
    }

    return $config;
}


/**
* 验证手机号是否正确
* @author honfei
* @param number $mobile
*/
function isMobile($mobile)
{
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('/^1\d{10}$/', $mobile) ? true : false;
}


/**
 * 发送短信逻辑
 * @param unknown $scene
 */
function sendSms($sender, $params)
{
    //发送记录存储数据库
    $code = $params;
    $msg = "用户注册,验证码".$code."，用户注册新账号, 请勿告诉他人，感谢您的支持!";
    $log_id =Db::name('msg')->insertGetId(array('mobile' => $sender, 'code' => $code, 'create_time' => time(), 'status' => 0, 'msg' => $msg));

    if ($sender != '' && isMobile($sender)) {//如果是正常的手机号码才发送

        try {
            $resp = mySend($sender, $code);//自定义发送短信------qlq

        } catch (\Exception $e) {
            $resp = ['status' => 0, 'msg' => "短信发送失败 异常"];
        }

        if ($resp['status'] == 1) {
            Db::name('msg')->where(array('id' => $log_id))->update(array('status' => 1)); //修改发送状态为成功
        }
        return $resp;

    }else{
        return $result = ['status' => 0, 'msg' => '接收手机号不正确['.$sender.']'];
    }
    return;


}

/**
 * [自定义短信发送---qlq description]
 * @return [type] [description]
 */
function mySend($mobile,$code){
    include_once '../vendor/yunxun/sms.php';
    // $_SESSION[$mobile]=$code;
    session($mobile,$code);
    //初始化必填
    $options['accountsid'] = "81326f55a79ff7b904a1f4769f506257";
    $options['token'] = "f5f7b8295aaaf9c4f8b093a356c1208d";

    $ucpass = new \yunxun\sms($options);

    // //开发者账号信息查询默认为json或xml
    $ucpass->getDevinfo('xml');

    //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
    $appId = "d79382d7ec064d69969caee8e4cd3d8e";
    $to = $mobile;//;//"18620005282";$_GET['mobile']
    $templateId = "423227";
    $param=$code;//"4234";//可以增加参数
    $resp = $ucpass->templateSMS($appId,$to,$templateId,$param);

    if($resp){
        return array('status' => 1, 'msg' => "发送成功");
    }else{
        return array('status' => 0, 'msg' => "发送失败");
    }

}




///**
// * 阿里云云通信发送短息
// * @param string $mobile    接收手机号
// * @param string $tplCode   短信模板ID
// * @param array  $tplParam  短信内容
// * @return array
// */
//function sendMsg($mobile,$tplCode,$tplParam){
//    if( empty($mobile) || empty($tplCode) ) return array('Message'=>'缺少参数','Code'=>'Error');
//    if(!isMobile($mobile)) return array('Message'=>'无效的手机号','Code'=>'Error');
//
//    require_once '../extend/aliyunsms/vendor/autoload.php';
//    Config::load();             //加载区域结点配置
//    $accessKeyId = config('alisms_appkey');
//    $accessKeySecret = config('alisms_appsecret');
//    if( empty($accessKeyId) || empty($accessKeySecret) ) return array('Message'=>'请先在后台配置appkey和appsecret','Code'=>'Error');
//    $templateParam = $tplParam; //模板变量替换
//    //$signName = (empty(config('alisms_signname'))?'阿里大于测试专用':config('alisms_signname'));
//	$signName = config('alisms_signname');
//    //短信模板ID
//    $templateCode = $tplCode;
//    //短信API产品名（短信产品名固定，无需修改）
//    $product = "Dysmsapi";
//    //短信API产品域名（接口地址固定，无需修改）
//    $domain = "dysmsapi.aliyuncs.com";
//    //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
//    $region = "cn-hangzhou";
//    // 初始化用户Profile实例
//    $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
//    // 增加服务结点
//    DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
//    // 初始化AcsClient用于发起请求
//    $acsClient= new DefaultAcsClient($profile);
//    // 初始化SendSmsRequest实例用于设置发送短信的参数
//    $request = new SendSmsRequest();
//    // 必填，设置雉短信接收号码
//    $request->setPhoneNumbers($mobile);
//    // 必填，设置签名名称
//    $request->setSignName($signName);
//    // 必填，设置模板CODE
//    $request->setTemplateCode($templateCode);
//    // 可选，设置模板参数
//    if($templateParam) {
//        $request->setTemplateParam(json_encode($templateParam));
//    }
//    //发起访问请求
//    $acsResponse = $acsClient->getAcsResponse($request);
//    //返回请求结果
//    $result = json_decode(json_encode($acsResponse),true);
//
//    return $result;
//}



//生成网址的二维码 返回图片地址
function Qrcode($token, $url, $size = 8){ 
    $md5 = md5($token);
    $dir = date('Ymd'). '/' . substr($md5, 0, 10) . '/';
    $patch = 'qrcode/' . $dir;
    if (!file_exists($patch)){
        mkdir($patch, 0755, true);
    }
    $file = 'qrcode/' . $dir . $md5 . '.png';
    $fileName =  $file;
    if (!file_exists($fileName)) {

        $level = 'L';
        $data = $url;
        QRcode::png($data, $fileName, $level, $size, 2, true);
    }
    return $file;
}



/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}



//时间格式化1
function formatTime($time) {
    $now_time = time();
    $t = $now_time - $time;
    $mon = (int) ($t / (86400 * 30));
    if ($mon >= 1) {
        return '一个月前';
    }
    $day = (int) ($t / 86400);
    if ($day >= 1) {
        return $day . '天前';
    }
    $h = (int) ($t / 3600);
    if ($h >= 1) {
        return $h . '小时前';
    }
    $min = (int) ($t / 60);
    if ($min >= 1) {
        return $min . '分钟前';
    }
    return '刚刚';
}


//时间格式化2
function pincheTime($time) {
     $today  =  strtotime(date('Y-m-d')); //今天零点
      $here   =  (int)(($time - $today)/86400) ; 
      if($here==1){
          return '明天';  
      }
      if($here==2) {
          return '后天';  
      }
      if($here>=3 && $here<7){
          return $here.'天后';  
      }
      if($here>=7 && $here<30){
          return '一周后';  
      }
      if($here>=30 && $here<365){
          return '一个月后';  
      }
      if($here>=365){
          $r = (int)($here/365).'年后'; 
          return   $r;
      }
     return '今天';
}


function getRandomString($len, $chars=null){
    if (is_null($chars)){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }  
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
        $str .= $chars[mt_rand(0, $lc)];  
    }
    return $str;
}


function random_str($length){
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
 
    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++)
    {
        $rand = mt_rand(0, $arr_len-1);
        $str.=$arr[$rand];
    }
 
    return $str;
}

//postCurl方法
function postCurl($url, $body, $header = array(), $method = "POST")
{
    array_push($header, 'Accept:application/json');
    array_push($header, 'Content-Type:application/json');
    //array_push($header, 'http:multipart/form-data');

    $ch = curl_init();//启动一个curl会话
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, $method, 1);

    switch ($method){
        case "GET" :
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            break;
        case "POST":
            curl_setopt($ch, CURLOPT_POST,true);
            break;
        case "PUT" :
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "DELETE":
            curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
    }

    curl_setopt($ch, CURLOPT_USERAGENT, 'SSTS Browser/1.0');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  //原先是FALSE，可改为2
    if (isset($body{3}) > 0) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }
    if (count($header) > 0) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

    $ret = curl_exec($ch);
    $err = curl_error($ch);


    curl_close($ch);
    //clear_object($ch);
    //clear_object($body);
    //clear_object($header);

    if ($err) {
        return $err;
    }

    return $ret;
}

/**
 * 环信api
 * 获取app管理员token
 * POST /{dihon}/{loveofgod}/token
 */
function getToken()
{
    $url="https://a1.easemob.com/1191171218115948/uad360/token";
    $body=array(
        "grant_type"=>"client_credentials",
        "client_id"=>'YXA60IQPYOO5Eee6X0N9YwlwqQ',
        "client_secret"=>'YXA6IYVibkVPknlp-3DIX3nTo_rSnn8'
    );
    $patoken=json_encode($body);
//    $header = array(
//        'Content-Type'=>'application/json'
//    );
//    $method = 'POST';
    $res = postCurl($url,$patoken);
    $tokenResult = array();

    $tokenResult =  json_decode(trim($res,chr(239).chr(187).chr(191)), true);
    //var_dump($tokenResult);
    return "Authorization:Bearer ".$tokenResult['access_token'];
//    return $res;
}

/**
 *
 */
function return_http_url($url){
    if(strpos('$'.$url,'http://')){
        return $url;
    }
    if(strpos('$'.$url,'https://')){
        return $url;
    }
    if(empty($url)){
        return "";
    }
    $url = request_scheme()."://".$_SERVER['HTTP_HOST']."/".$url;
    return $url;
}

function request_scheme(){
    $server_request_scheme='http';
    if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
        $server_request_scheme = 'https';
    }
    return $server_request_scheme;
}

function validate_password($password, $good_hash)
{
    $params = explode(":", $good_hash);
    if(count($params) < HASH_SECTIONS)
        return false;
    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
    return slow_equals(
        $pbkdf2,
        pbkdf2(
            $params[HASH_ALGORITHM_INDEX],
            $password,
            $params[HASH_SALT_INDEX],
            (int)$params[HASH_ITERATION_INDEX],
            strlen($pbkdf2),
            true
        )
    );
}

// Compares two strings $a and $b in length-constant time.
function slow_equals($a, $b)
{
    $diff = strlen($a) ^ strlen($b);
    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
    {
        $diff |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $diff === 0;
}

/*
    * PBKDF2 key derivation function as defined by RSA's PKCS #5: https://www.ietf.org/rfc/rfc2898.txt
    * $algorithm - The hash algorithm to use. Recommended: SHA256
    * $password - The password.
    * $salt - A salt that is unique to the password.
    * $count - Iteration count. Higher is better, but slower. Recommended: At least 1000.
    * $key_length - The length of the derived key in bytes.
    * $raw_output - If true, the key is returned in raw binary format. Hex encoded otherwise.
    * Returns: A $key_length-byte key derived from the password and salt.
    *
    * Test vectors can be found here: https://www.ietf.org/rfc/rfc6070.txt
    *
    * This implementation of PBKDF2 was originally created by https://defuse.ca
    * With improvements by http://www.variations-of-shadow.com
    */
function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        die('PBKDF2 ERROR: Invalid hash algorithm.');
    if($count <= 0 || $key_length <= 0)
        die('PBKDF2 ERROR: Invalid parameters.');

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        // $i encoded as 4 bytes, big endian.
        $last = $salt . pack("N", $i);
        // first iteration
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        // perform the other $count - 1 iterations
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}

/**
 * 读取用户的子db链接
 * @param type $user_id
 * @return string
 */
function getUserDbConn($user_id) {
    $userSite = db::name('user_site')->where('user_id',$user_id)->find();
    $connString = "mysql://" . $userSite["db_user"] . ":" . $userSite["db_pwd"] . "@" . $userSite["db_host"] . ":" . $userSite["db_port"] . "/" . $userSite["db_name"]."#utf8";
    return $connString;
}

/**
 * 依次给路径中的目录赋予权限
 * @param $path
 * @param int $mode
 */
function permissions($path,$mode=0777){
    $arr = explode("/",$path);

    $path = "";
    foreach ($arr as $name){
        if(!empty($name)){
            $path .= $name."/";
            if(!is_dir($path)){
                mkdir($path);
                chmod($path,$mode);
            }
        }
    }
}

//生成存储作品图片的路径
function getSaveImgPath($user_id) {
    $savePath = config('savePath.layout_img_path') . DS . $user_id . DS . date('Ymd');
    return $savePath;
}

//生成存储作品图片的路径
function getSaveVideoPath($user_id) {
    $savePath = config('savePath.layout_video_path') . DS . $user_id . DS . date('Ymd');
    return $savePath;
}

//生成存储作品图片的路径
function getSaveWordsImgPath($user_id) {
    $savePath = config('savePath.words_img_path') . DS . $user_id . DS . date('Ymd');
    return $savePath;
}

//生成存储作品视频的路径
function getSaveWordsVideoPath($user_id) {
    $savePath = config('savePath.words_video_path') . DS . $user_id . DS . date('Ymd');
    return $savePath;
}

//生成存储作品视频的路径
function getSaveMediaCenterImgPath($user_id) {
    $savePath = config('savePath.mediacenter_img_path') . DS . $user_id . DS . date('Ymd');
    return $savePath;
}

//生成存储ppt的路径
function getSaveMediaCenterPptPath() {
    $savePath = config('savePath.mediacenter_ppt_path') . DS . date('Ymd');
    return $savePath;
}

//生成存储word的路径
function saveWordPath() {
    $savePath = config('savePath.layout_word_path') . DS . date('Ymd');
    return $savePath;
}
//生成存储word的路径
function savePptPath() {
    $savePath = config('savePath.layout_ppt_path') . DS . date('Ymd');
    return $savePath;
}
//生成存储Pdf的路径
function savePdfPath() {
    $savePath = config('savePath.layout_pdf_path') . DS . date('Ymd');
    return $savePath;
}

//生成存储word转图片的路径
function saveWordPicPath($name) {
    $savePath = config('savePath.layout_word_path') . DS . date('Ymd'). DS . $name . DS;
    return $savePath;
}

function getSaveWordsPath() {
    $datas=time();
    $guid=createGUID($datas);
    $savePath = config('savePath.mediacenter_words_path') . DS . date('Ymd').DS. $guid;
    return $savePath;
}


//生成ＰＰＴ的路径
function getSaveWordsPptPath() {
    $datas=time();
    $guid=createGUID($datas);
    $savePath = config('savePath.mediacenter_ppt_path') . DS . date('Ymd').DS. $guid;
    return $savePath;
}


function modelReturn ($code, $msg, $data = []) {
    $result = [
        'code'  =>  $code,
        'msg'   =>  $msg,
        'data'  =>  $data
    ];
    return $result;
}

/**
 * 按xml方式输出通信数据
 * @param  integer $code    状态码
 * @param  string $message  提示信息
 * @param  array  $data     数据
 * @return string           返回XML数据
 */
function xml($data = array()){
    header("content-type:text/xml;");
    $xml = "<?xml version='1.0' encoding='UTF-8'?>";
    $xml .= xmlToEncode($data);
    return $xml;
}
function xmlToEncode($data){
    $xml = '';
    $attr = '';
    foreach($data as $key => $value){
        if(is_numeric($key)){
            $attr = "id='{$key}'";
            $key = "item";
        }
        $xml .= "<{$key} {$attr}>\n";
        $xml .= is_array($value)? xmlToEncode($value):$value;
        $xml .= "</{$key}>\n";
    }
    return $xml;
}
//生成GUID
function createGuid(){
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $hyphen = chr(45);// "-"
    $uuid = substr($charid, 6, 2).substr($charid, 4, 2).
        substr($charid, 2, 2).substr($charid, 0, 2).$hyphen
        .substr($charid, 10, 2).substr($charid, 8, 2).$hyphen
        .substr($charid,14, 2).substr($charid,12, 2).$hyphen
        .substr($charid,16, 4).$hyphen.substr($charid,20,12);
    return $uuid;
}

function getTree($data, $pId)
{
    $html = '';
    foreach($data as $k => $v)
    {
        if($v['pid'] == $pId)
        {        //父亲找到儿子
            $html .= "<li><span onclick='getInfo({$v["id"]})'><i class='glyphicon glyphicon-align-justify'></i>&nbsp;&nbsp;&nbsp;{$v['name']}</span>";
            $html .= getTree($data, $v['id']);
            $html = $html."</li>";
        }
    }
    return $html ? '<ul>'.$html.'</ul>' : $html ;
}
/**
 * PDF2PNG
 * @param $pdf待处理的PDF文件
 * @param $path待保存的图片路径
 * @param int|待导出的页面 $page 待导出的页面 -1为全部 0为第一页 1为第二页
 * @return 保存好的图片路径和文件名 注：此处为坑 对于Imagick中的$pdf路径 和$path路径来说，   php版本为5+ 可以使用相对路径。php7+版本必须使用绝对路径。所以，建议大伙使用绝对路径。
 * 注：此处为坑 对于Imagick中的$pdf路径 和$path路径来说，   php版本为5+ 可以使用相对路径。php7+版本必须使用绝对路径。所以，建议大伙使用绝对路径。
 */
function pdfToPng($pdf,$path,$page=-1)
{
    if(!extension_loaded('imagick')) {
        return ajaxRetrun(0,'环境未安装imagick程序');
    }
    if(!file_exists($pdf))
    {
        return ajaxRetrun(0,'要处理的PDF文件不存在');
    }
    if(!is_readable($pdf))
    {
        return ajaxRetrun(0,'要处理的PDF文件权限不够');
    }
    $im = new \Imagick();
    $im->setResolution(150,150);
    $im->setCompressionQuality(100);
    if($page==-1){
        $im->readImage($pdf);
    } else{
        $im->readImage($pdf."[".$page."]");
    }

    foreach ($im as $Key => $Var)
    {
        $Var->setImageFormat('jpg');
        $filename = $path. md5($Key.time()).'.jpg';
        if($Var->writeImage($filename) == true)
        {
            $Return[] = $filename;
        }
    }
    //返回转化图片数组，由于pdf可能多页，此处返回二维数组。
    return $Return;
}

/**
 * 改变图片的宽高
 *
 * @author flynetcn (2009-12-16)
 *
 * @param string $img_src 原图片的存放地址或url
 * @param string $new_img_path  新图片的存放地址
 * @param int $new_width  新图片的宽度
 * @param int $new_height 新图片的高度
 * @return bool  成功true, 失败false
 */
function resize_image($img_src, $new_img_path, $new_width, $new_height)
{
    $img_info = @getimagesize($img_src);
    if (!$img_info || $new_width < 1 || $new_height < 1 || empty($new_img_path)) {
        return false;
    }
    if (strpos($img_info['mime'], 'jpeg') !== false) {
        $pic_obj = imagecreatefromjpeg($img_src);
    } else if (strpos($img_info['mime'], 'gif') !== false) {
        $pic_obj = imagecreatefromgif($img_src);
    } else if (strpos($img_info['mime'], 'png') !== false) {
        $pic_obj = imagecreatefrompng($img_src);
    } else {
        return false;
    }
    $pic_width = imagesx($pic_obj);
    $pic_height = imagesy($pic_obj);
    if (function_exists("imagecopyresampled")) {
        $new_img = imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
    } else {
        $new_img = imagecreate($new_width, $new_height);
        imagecopyresized($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
    }
    if (preg_match('~.([^.]+)$~', $new_img_path, $match)) {
        $new_type = strtolower($match[1]);
        switch ($new_type) {
            case 'jpg':
                imagejpeg($new_img, $new_img_path);
                break;
            case 'gif':
                imagegif($new_img, $new_img_path);
                break;
            case 'png':
                imagepng($new_img, $new_img_path);
                break;
            default:
                imagejpeg($new_img, $new_img_path);
        }
    } else {
        imagejpeg($new_img, $new_img_path);
    }
    imagedestroy($pic_obj);
    imagedestroy($new_img);
    return true;
}

function sizecount($filesize) {
    if($filesize >= 1073741824) {
        $filesize = round($filesize / 1073741824 * 100) / 100 . 'GB';
    } elseif($filesize >= 1048576) {
        $filesize = round($filesize / 1048576 * 100) / 100 . 'MB';
    } elseif($filesize >= 1024) {
        $filesize = round($filesize / 1024 * 100) / 100 . 'KB';
    }elseif($filesize == 0) {
        $filesize = 0;
    } else {
        $filesize = $filesize . 'B';
    }
    return $filesize;
}

function getVideoCover($file,$imgPath) {
    $strlen = strlen($file);
    /*
     * -ss 从视频几秒的地方截取
     * -s 图片大小
    */
    $str = "ffmpeg -i $file -y -f image2 -t 0.001 -ss 1 -s 1920x1080 ".$imgPath;
    $result = system($str);
    return $imgPath;
}

/**
 * 秒数转换成   （时：分）
 * 秒数应该小于等于86400
 * @param $sec 秒数
 */
function secToStr($sec){
    if($sec<=86400 && is_numeric($sec)){
        $hours = floor($sec/3600)>=10 ? floor($sec/3600) : "0".floor($sec/3600);
        $sec = ($sec%3600);
        $minutes = ceil($sec/60)>=10 ? ceil($sec/60) : "0".ceil($sec/60);
        return $hours.":".$minutes;
    }else{
        return false;
    }
}

/**
 * post: 创建任务
 * path: createTasks
 * method: createTasks
 * param: module - {string} 模块名称
 * param: task_name - {string} 任务名称
 * param: task_content - {string} 根据任务名称填写对应的任务格式内容
 */
function createTasks ($module, $task_name, $task_content) {
    $taskModel = Db::name('task');
    $data = json_decode($task_content,true);
    if (count($data) > 0) {
        $taskData = [
            'task_num'      =>  $order_number = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8),
            'module'        =>  $module,
            'task_name'     =>  $task_name,
            'device_id'    =>  $data['device_id'] ? $data['device_id'] : '',
            'create_time'   =>  time(),
            'task_content'  =>  json_encode($data),
            'callback_url'  =>  '/api/v2.phoney1/taskCallback',
            'modular_type' => isset($data['modular_type']) ? $data['modular_type'] : 1,
            'is_fail_retransmission'    =>  isset($data['is_fail_retransmission']) ? $data['is_fail_retransmission'] : 1,
            'retransmission_times' => 0,
            'org_num'=> isset($data['org_num']) ? $data['org_num'] : 0,
        ];
        $result = $taskModel -> insert($taskData);
    }
    return $result;
}

/**

 * 字节格式化 把字节数格式为B K M G T P E Z Y 描述的大小

 * @param int $size 大小

 * @param int $dec 显示类型

 * @return int

 */

function byte_format($size,$dec=2)

{

    $a = array("B", "KB", "MB", "GB", "TB", "PB","EB","ZB","YB");

    $pos = 0;

    while ($size >= 1024)

    {

        $size /= 1024;

        $pos++;

    }

    return round($size,$dec)." ".$a[$pos];

}

/** 所有的分类
 * @parem $array 数组
 * @parem $pid ，最高级别,默认为0，输出从pid 级别的数据
 * @parem $level 层级，默认0
 * */
function getTrees($array, $pid =0, $level = 0){

    //声明静态数组,避免递归调用时,多次声明导致数组覆盖
    static $list = [];

    foreach ($array as $key => $value){
        //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
        if ($value['pid'] == $pid){
            //父节点为根节点的节点,级别为0，也就是第一级
            $flg = str_repeat('|--',$level);
            // 更新 名称值
            $value['name'] = $flg.$value['name'];
            //把数组放到list中
            $list[] = $value;
            //把这个节点从数组中移除,减少后续递归消耗
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            getTrees($array, $value['id'], $level+1);
        }
    }
    return $list;
}

function getTreess($array, $pid =0, $level = 0){

    // 空数组 不在执行
    if(empty($array))
        return false;

    //声明静态数组,避免递归调用时,多次声明导致数组覆盖
    static $html;
    $html.="<ul>";

    foreach ($array as $key => $value){

        //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
        if ($value['pid'] == $pid){
            //父节点为根节点的节点,级别为0，也就是第一级
            $flg = str_repeat('|--',$level);
            // 更新 名称值
            $value['name'] = $flg.$value['name'];
            $html.=$temp="<li><input type=\"checkbox\" name=\"limit_id[]\" value='".$value['id']."' >".$value['name'];

            //把这个节点从数组中移除,减少后续递归消耗
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            $vv=getTreess($array, $value['id'], $level+1);

            // 如果顶级分类下没有一个下级，删除此分类，此步骤可以省略
            if(empty($vv) && ($pid<1))
            {
                $html=str_replace($temp,'',$html);
            }
            $html.="</li>\r\n";

        }
    }
    $html.="</ul>\r\n";

    // 删除多余的 ul 标签
    $html=str_replace("<ul></ul>",'',$html);
    return $html;
}

//生成无限极分类树
function make_tree($arr,$pid=0){
    $refer = array();
    $tree = array();
    foreach($arr as $k => $v){
        $refer[$v['id']] = & $arr[$k]; //创建主键的数组引用
    }
    foreach($arr as $k => $v){
        if($pid == 0){
            $pids = $v['pid'];  //获取当前分类的父级id
            if($pids == $pid){
                $tree[] = & $arr[$k];  //顶级栏目
            }else{
                if(isset($refer[$pids])){
                    $refer[$pids]['son'][] = &$arr[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }else{
                    $tree[] = & $arr[$k];
                }
            }
        }else{
            if($v['id'] == $pid){
                $tree[] = & $arr[$k];  //顶级栏目
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['son'][] = &$arr[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }else{
                    $tree[] = & $arr[$k];
                }
            }
        }

    }
    return $tree;
}

//获取指定分类所有子ID号
function getAllChildcateIds($categoryID){
    //初始化ID数组
    $array[] = $categoryID;
    do {
        $ids = '';
        $where['pid'] = array('in',$categoryID);

        $db = Db::name('device_department');
        $cate = $db->where($where)->select();
        foreach ($cate as $k=>$v){
            $array[] = $v['id'];
            $ids .= ',' . $v['id'];
        }
        $ids = substr($ids, 1, strlen($ids));
        $categoryID = $ids;
    }
    while (!empty($cate));
    $ids = implode(',', $array);
    return $ids;    //  返回字符串
    //return $array //返回数组
}

//获取指定分类所有父ID号
function getAllFcateIds($categoryID){
//初始化ID数组
    $array[] = $categoryID;
    do{
        $ids = '';
        $where['id'] = array('in',$categoryID);
        $cate = M('cate')->where($where)->select();
        echo M('cate')->_sql();
        foreach ($cate as $v){
            $array[] = $v['pid'];
            $ids .= ',' . $v['pid'];
        }
        $ids = substr($ids, 1, strlen($ids));
        $categoryID = $ids;
    }
    while (!empty($cate));
    $ids = implode(',', $array);
    return $ids;   //  返回字符串
//return $array //返回数组
}

//获取指定分类的所有子分类 键为ID，值为分类名
function getCateKv($categoryID){
    //初始化ID数组,赋值当前分类
    $array[] = M('cate')->where("id={$categoryID}")->getField("cateName");
    do {
        $ids = '';
        $where['pid'] = array('in',$categoryID);
        $cate = M('cate')->where($where)->select();
        echo M('cate')->_sql();
        foreach ($cate as $k=>$v) {
            $array[$v['id']] = $v['cateName'];
            $ids .= ',' . $v['id'];
        }
        $ids = substr($ids, 1, strlen($ids));
        $categoryID = $ids;
    }
    while (!empty($cate));
    $ids = implode(',', $array);
    //return $ids; //  返回字符串
    return $array; //返回数组
}

function HtmlTree($array,$pid=0,$level = 0,$selectedId=0){
    // 空数组 不在执行
    if(empty($array)){
        return;
    }
    static $html;

    foreach ($array as $key => $value){
        $select = '';
        //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
        if ($value['pid'] == $pid){
            //父节点为根节点的节点,级别为0，也就是第一级
            $flg = str_repeat('|--',$level);
            if($value['id'] == $selectedId){
                $select = 'selected';
            }
            // 更新 名称值
            $value['name'] = $flg.$value['name'];
            $html.="<option value='{$value['id']}' {$select}>{$value['name']}</option>";

            //把这个节点从数组中移除,减少后续递归消耗
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            HtmlTree($array, $value['id'], $level+1,$selectedId);

        }
    }

    return $html;
}
