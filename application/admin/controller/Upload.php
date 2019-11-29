<?php

namespace app\admin\controller;
use app\admin\model\FileModel;
use app\admin\model\MediaCenterModel;
use think\Db;
use app\admin\model\ProductFileModel;
use think\Controller;
use think\File;
use think\Request;

class Upload extends Base
{
	//图片上传
    public function upload(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/images');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }

    //上传需求文档
    public function uploadNeedsFile(){
        $file = request()->file('file');
//        dump($file);die;
        $savePath = config('savePath.needs_file_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'txt'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return ajaxRetrun(1,'上传成功',$data);
        }else{
            return ajaxRetrun(0,$file->getError());
        }
    }

    //荣誉图
    public function uploadHonorImg(){
        $file = request()->file('file');
        $savePath = config('savePath.honor_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            $res = [
                "errno" => 0,
                "data" => [
                    return_http_url($data['url'])
                ]
            ];
//            dump($data['url']);die;
            return json($res);
        }else{
            return ajaxRetrun(-1,$file->getError());
        }
    }
    //招商发布图
    public function uploadReleaseImg(){
        $file = request()->file('file');
        $savePath = config('savePath.release_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            $res = [
                "errno" => 0,
                "data" => [
                    return_http_url($data['url'])
                ]
            ];
//            dump($data['url']);die;
            return json($res);
        }else{
            return ajaxRetrun(-1,$file->getError());
        }
    }


    //咨询图片
    public function uploadNewsImg(){
        $file = request()->file('file');
        $savePath = config('savePath.news_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            $res = [
                "errno" => 0,
                "data" => [
                    return_http_url($data['url'])
                ]
            ];
//            dump($data['url']);die;
            return json($res);
        }else{
            return ajaxRetrun(-1,$file->getError());
        }
    }

    //产品图片
    public function uploadGoodsImg(){
        $file = request()->file('file');
        $savePath = config('savePath.goods_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            $res = [
                "errno" => 0,
                "data" => [
                    return_http_url($data['url'])
                ]
            ];
//            dump($data['url']);die;
            return json($res);
        }else{
            return ajaxRetrun(-1,$file->getError());
        }
    }


    //首页广告缩图
    public function uploadHomepage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/homepage_advertise');
        $savePath = config('savePath.homepage_path');
        $url = DS.$savePath . DS. $info->getSaveName();
        if($info){
            echo $url;
        }else{
            echo $file->getError();
        }
    }


    //首页产品类型缩图
    public function uploadGoodsType(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/goods_type');
        $savePath = config('savePath.goods_type_img_path');
        $url = DS.$savePath . DS. $info->getSaveName();
        if($info){
            echo $url;
        }else{
            echo $file->getError();
        }
    }


    //首页产品缩略图
    public function uploadGoods(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/goods');
        $savePath = config('savePath.goods_path');
        $url = DS.$savePath . DS. $info->getSaveName();
        if($info){
            echo $url;
        }else{
            echo $file->getError();
        }
    }

    //前端标题图片
    public function uploadHonorTitle(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/honor_title');
        $savePath = config('savePath.honor_title_path');
        $url = DS.$savePath . DS. $info->getSaveName();
        if($info){
            echo $url;
        }else{
            echo $file->getError();
        }
    }

    //前端标题图片
    public function uploadNewsTitle(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/news_title');
        $savePath = config('savePath.news_title_path');
        $url = DS.$savePath . DS. $info->getSaveName();
        if($info){
            echo $url;
        }else{
            echo $file->getError();
        }
    }


    //首页介绍图片
    public function uploadContentImg(){
        $file = request()->file('file');
        $savePath = config('savePath.content_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath  . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            $res = [
                "errno" => 0,
                "data" => [
                    return_http_url($data['url'])
                ]
            ];
//            dump($data['url']);die;
            return json($res);
        }else{
            return ajaxRetrun(-1,$file->getError());
        }
    }
    
    //上传原型图
    public function uploadPrototypeImg(){
        $file = request()->file('file');
        $savePath = config('savePath.prototype_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return ajaxRetrun(1,'上传成功',$data);
        }else{
            return ajaxRetrun(0,$file->getError());
        }
    }
    //上传UI图
    public function uploadUIImg(){
        $file = request()->file('file');
        $savePath = config('savePath.UI_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return ajaxRetrun(1,'上传成功',$data);
        }else{
            return ajaxRetrun(0,$file->getError());
        }
    }
    //上传反馈文档
    public function uploadFeedbackFile(){
        $file = request()->file('file');
        $savePath = config('savePath.feedback_file');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'txt,gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return ajaxRetrun(1,'上传成功',$data);
        }else{
            return ajaxRetrun(0,$file->getError());
        }
    }


    //会员头像上传
    public function uploadface(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }

    //上传订单图
    public function uploadOrderImg(){
        $file = request()->file('file');
        $savePath = config('savePath.order_img_path');
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'gif,jpg,jpeg,bmp,png'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . $savePath . DS . date('Y-m-d',time()));
        if($info){
            $data['url'] = $savePath . DS . date('Y-m-d',time()) . DS . $info->getSaveName();
//            $data['size'] = $file->getSize();
            return ajaxRetrun(1,'上传成功',$data);
        }else{
            return ajaxRetrun(0,$file->getError());
        }
    }



    //webuploaddemo
    public function webuploaderDemo(){
        $file = \request()->file('file');
        $savePath = 'uploads/1';
        $info = $file->validate(['size' => 1024 * 1024 * 1000])->move(ROOT_PATH . 'public' . DS . $savePath);
        if($info){

        }
    }
}