<?php

namespace app\api\controller;
use app\admin\model\JoinModel;
use think\Controller;
use think\Db;

class Join extends Base
{
    public function Join(){
        $joinModel = new JoinModel();
        $post = input('post.');
        $post['create_time'] = time();
        $fag = $joinModel->insertData($post);
        $post['type']==1?$msg='询问':$msg='招商';
        if($fag){
            return returnAjax(1,'创建'.$msg.'成功',[]);
        }
        return returnAjax(0,'创建'.$msg.'失败',[]);
    }
}