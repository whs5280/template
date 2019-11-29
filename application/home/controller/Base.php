<?php

namespace app\home\controller;
use app\common\model\WordsCategoryModel;
use app\home\model\BaseModel;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        //获取作品分类
        $words_category = new WordsCategoryModel();
        $categorys = $words_category->getCategorys();
        $this->assign('cate', $categorys);
        $user_info= [];

        //判断用户是否存在
        if(session('uid')) {
            //获取用户信息
            $user_info = [
                'uid' => session('uid'),
                'nickname' => session('nickname'),
                'account' => session('account'),
                'head_img' => session('head_img'),
            ];
        }

        $this->assign('user_info',$user_info);

    }
}