<?php

namespace app\admin\controller;
use app\admin\model\GoodsModel;
use app\admin\model\HomepageAdvertiseModel;
use app\admin\model\HomepageTitleModel;
use think\Cache;
use think\Db;

class Homepage extends Base
{
    /*
     *
     * 首页商品模块
     * */
    public function index(){

        $key = input('key');
        $map['is_push']= '1';
        if($key && $key !== "")
        {
            $map['name|keyname|gt.type_descr'] = ['like',"%" . $key . "%"];
        }
        $goods = new GoodsModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $goods->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $goods->getGoodsByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        //print_r($lists);exit;
        foreach($lists as $k=>$v)
        {
            $lists[$k]['create_time']=date('Y-m-d H:i:s',$v['create_time']);
        }
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }
    /*
     *
     *
     *
     *
     * 首页广告
     *
     *
     *
     *
     * */

    public function advertise_index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['t.id|g.name'] = ['like',"%" . $key . "%"];
        }
        $advertise = new HomepageAdvertiseModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $advertise->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $advertise->getAdvertiseByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        //print_r($lists);exit;
        foreach($lists as $k=>$v)
        {
            $lists[$k]['create_time']=date('Y-m-d H:i:s',$v['create_time']);
        }
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }

/**
* 添加广告
*/
    public function addAdvertise()
    {
        $advertise = new HomePageAdvertiseModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();

            $flag = $advertise->insertAdvertise($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $goods = $advertise->getAllGoods();
        $this->assign('goods' , $goods);
        return $this->fetch();
    }
    /**
     * 修改广告
     */
    public function editAdvertise()
    {
        $advertise = new HomePageAdvertiseModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $flag = $advertise->editAdvertise($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $where1['id'] = $id;
        $data = $advertise ->getOneAdvertise($where1);
        $where2['g.id'] = $data['goods_id'];
        $goods = $advertise->getAllGoods();
        $onegoods = $advertise->getOneGoods($where2);
        $this->assign('goods' , $goods);
        $this->assign('data' , $data);
        $this->assign('onegoods' , $onegoods);
        return $this->fetch();
    }
    /**
     * 删除广告
     */
    public function delAdvertise() {

        try {
            $id = input('param.id');
            $Advertise = new HomepageAdvertiseModel();
            $where['id'] = $id;
            $pic = $Advertise->getOneAdvertise($where);
            $path = ROOT_PATH.'public' . DS . 'uploads/homepage_advertise/'.$pic['path'];
            //var_dump($path);die;
            $reg = file_exists($pic['path']);
            if($reg){
                unlink($path);
                $flag = $Advertise->delAdvertise($id);
                return json($flag);
            }else{
                $Advertise->delAdvertise($id);
                return ajaxRetrun(1,'图片不存在,已将数据强制删除');
            }
        }catch ( \Exception $e) {
            writelog(-1, '删除广告',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }




    /*
     *
     *
     *
     * 首页标题
     *
     *
     *
     * */
    public function title_index(){
        $title = new HomepageTitleModel();
        $data = $title->getTitle();
        $data['create_time']=date('Y-m-d H:i:s',$data['create_time']);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 修改标题
     */
    public function titleEdit()
    {
        $title = new HomepageTitleModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $flag = $title->editTitle($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $data = $title->getTitle();
        $this->assign('data' , $data);
        return $this->fetch();
    }
}