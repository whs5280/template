<?php



namespace app\api\controller;

use think\Controller;
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Upload extends Controller
{


    //上传订单图
    public function uploadOrderImg(){
        $file = request()->file('file');
        $savePath = config('savePath.order_img_path');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/order_img');
        if($info){
            $data['url'] = $savePath  . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return returnAjax(1,'上传成功',$data);
        }else{
            return returnAjax(0,$file->getError());
        }
    }

}