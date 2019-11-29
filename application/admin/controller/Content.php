<?php

namespace app\admin\controller;
use app\admin\model\GoodsModel;
use app\admin\model\ContentBusinessModel;
use think\Cache;
use think\Db;

class Content extends Base
{
    /*
     *
     * 商品模块
     * */
    public function index(){

        $business = new ContentBusinessModel();
        $lists = $business -> getOneContent();
        $lists['create_time']=date('Y-m-d H:i:s',$lists['create_time']);
        $this->assign('data',$lists);
        return $this->fetch();
    }
    /**
     * 编辑商品
     */
    public function editContentBusiness()
    {
        $business = new ContentBusinessModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $business->editContent($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $data = $business->getOneContent();
        $this->assign('data' , $data);
        return $this->fetch();
    }
}