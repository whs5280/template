<?php

namespace app\api\controller;
use app\admin\model\NewsModel;
use app\admin\model\UserModel;
use app\admin\model\GoodsTypeModel;
use app\admin\model\GoodsModel;
use app\admin\model\HomepageAdvertiseModel;
use app\admin\model\HomepageTitleModel;
use app\admin\model\HonorModel;
use app\admin\model\ContentBusinessModel;
use app\admin\model\JoinReleaseModel;
use app\admin\model\PrivatesOrderModel;
use think\Controller;
use think\Db;

class Api extends Base
{
    public function initialize()
    {
        parent::_initialize();
    }
    //用户
    public function getUser(){
        $user = new UserModel();
        $list = $user
            ->field('username,password')
            ->where('status=1')
            ->select();
        return returnAjax(1,'成功获取用户列表',$list);
    }
    //企业介绍
    public function ContentBusiness(){
        $model = new ContentBusinessModel();
        $list = $model
            ->alias('t1')
            ->select();
        return returnAjax(1,'成功获取企业介绍',$list);
    }
    //咨询
    public function news(){
        $model = new NewsModel();
        $list = $model
            ->alias('t1')
            ->select();
        return returnAjax(1,'成功获取咨询列表',$list);
    }
    //产品
    public function getGoods(){
        $key = input('key');
        $where['name|keyname|gt.type_descr'] = ['like',"%" . $key . "%"];
        $model = new GoodsModel();
        $list = $model
            ->where($where)
            ->field('g.*,gt.type_descr')
            ->alias('g')
            ->join('goods_type gt','g.type_id=gt.id','LEFT')
            ->where(['g.is_up'=>1])
            ->order('g.id desc')
            ->select();
        return returnAjax(1,'成功获取产品列表',$list);
    }
    //产品类型
    public function goodsType(){
        $model = new GoodsTypeModel();
        $list = $model
            ->alias('t1')
            ->select();
        return returnAjax(1,'成功获取产品类型列表',$list);
    }
    //首页广告
    public function Advertise(){
        $model = new HomepageAdvertiseModel();
        $list = $model
            ->alias('t1')
            ->field('t1.path,t2.name,t2.url')
            ->join('goods t2','t1.goods_id=t2.id','LEFT')
            ->select();
        return returnAjax(1,'成功获取首页广告',$list);
    }
    //首页产品
    public function HomepageGoods(){
        $model = new GoodsModel();
        $list = $model
            ->alias('t1')
            ->field('t1.*,t2.type_descr')
            ->join('goods_type t2','t1.type_id=t2.id','LEFT')
            ->where(['t1.is_up'=>1,'t1.is_push'=>1])
            ->select();
        return returnAjax(1,'成功获取首页产品',$list);
    }
    //创意想法
    public function getPrivates(){
        $model = new PrivatesOrderModel();
        $list = $model
            ->field('c.*,u.username,u.nick,u.email')
            ->alias('c')
            ->join('user u','c.user_id=u.id','LEFT')
            ->order('c.id desc')
            ->select();
        return returnAjax(1,'成功获取创意想法列表',$list);
    }
    //私人定制订单
    public function privatesOrder(){
        $model = new PrivatesOrderModel();
        $list = $model
            ->field('c.*,u.username,u.nick,u.email')
            ->alias('c')
            ->join('user u','c.user_id=u.id','LEFT')
            ->order('c.id desc')
            ->select();
        return returnAjax(1,'成功获取私人定制订单列表',$list);
    }
    //发布的加盟信息
    public function joinRelease(){
        $model = new JoinReleaseModel();
        $list = $model
            ->field('j.*')
            ->alias('j')
            ->order('j.id desc')
            ->select();
        return returnAjax(1,'成功获取加盟信息列表',$list);
    }
    //过往荣誉
    public function getHonor(){
        $model = new HonorModel();
        $list = $model
            ->field('h.*')
            ->alias('h')
            ->order('h.id desc')
            ->select();
        return returnAjax(1,'成功获取过往荣誉列表',$list);
    }
    //首页标题
    public function getTitle(){
        $model = new HomepageTitleModel();
        $list = $model->getTitle();
        return returnAjax(1,'成功获取标题',$list);
    }
}