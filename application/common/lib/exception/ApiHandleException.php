<?php
/**
 * API模块中，系统内部错误捕捉，返回客户端能识别的错误提示
 * Created by PhpStorm.
 * User: uad
 * Date: 18-3-22
 * Time: 下午5:38
 */

namespace app\common\lib\exception;
use think\exception\Handle;

class ApiHandleException extends Handle
{
    public $httpCode = 500;
    public $code = -100;
    public function render(\Exception $e){
        if($e instanceof ApiException){
            $this->httpCode = $e->httpCode;
            $this->code = $e->code;
        }
        if(config('app_debug')){
            //如果开启了调试模式则直接调用框架内部自带的报错机制，利于开发过程中开发者定位错误
            return parent::render($e);
        }
        return echoResponse($this->code,$e->getMessage(),[],$this->httpCode);
    }
}