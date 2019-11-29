<?php
/**
 * API模块中，自定义错误，返回客户端可读数据
 * Created by PhpStorm.
 * User: uad
 * Date: 18-3-22
 * Time: 下午5:38
 */

namespace app\common\lib\exception;
use think\Exception;

class ApiException extends Exception
{
    public $code = -100;
    public $message = '';
    public $httpCode = 400;
    public function __construct($code = -1, $message = '', $httpCode = 200){
        $this->code = $code;
        $this->message = $message;
        $this->httpCode = $httpCode;
    }
}