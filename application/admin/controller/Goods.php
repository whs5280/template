<?php

namespace app\admin\controller;
use app\admin\model\GoodsModel;
use app\admin\model\GoodsTypeModel;
use app\admin\model\GoodsImgModel;
use think\Cache;
use think\Db;

class Goods extends Base
{
    /*
     *
     * 商品模块
     * */
    public function index(){

        $key = input('key');
        $map = [];
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


    /**
     * 添加商品
     */
    public function addGoods()
    {
        $goods = new GoodsModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $flag = $goods->insertGoods($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $type = $goods->getAllType();
        $this->assign('type' , $type);
        return $this->fetch();
    }


    /**
     * 编辑商品
     */
    public function editGoods()
    {
        $goods = new GoodsModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $goods->editGoods($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $where['g.id']=$id;
        $info = $goods->getJoinData($where);
        $type = $goods->getAllType();
        $this->assign('goods' , $info);
        $this->assign('type' , $type);
        return $this->fetch();
    }


    /**
     * 删除商品
     */
    public function delGoods() {

        try {
            $id = input('param.id');
            $goods_model = new GoodsModel();
            $where['id'] = $id;
            $pic = $goods_model->getOneGoods($where);
            $path = ROOT_PATH.'public' . DS . 'uploads/goods/'.$pic['path'];
            //var_dump($path);die;
            $reg = file_exists($pic['path']);
            if($reg){
                unlink($path);
                $flag = $goods_model->delGoods($id);
                return json($flag);
            }else{
                $goods_model->delGoods($id);
                return ajaxRetrun(1,'图片不存在,已将数据强制删除');
            }
        }catch ( \Exception $e) {
            writelog(-1, '删除用户',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }



    /**
     * 商品上架状态
     */
    public function GoodsIsup()
    {
        try {
            $id = input('param.id');

            $goods_model = new GoodsModel();
            $where['id'] = $id;
            //获取当前记录信息
            $goods = $goods_model->getOneGoods($where);
            if ($goods['is_up'] == 1){//config('code.user_status')['pass']) {
                $flag = $goods_model->updateIsup($where, 0 );//config('code.user_status')['ban']);
                if($flag['code'] != 1) {
                    writelog(0, '修改商品状态',"修改状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改商品状态',"下架成功。");
                return ajaxRetrun(2,'下架成功');
            } else {
                $flag = $goods_model->updateIsup($where, 1 );//config('code.user_status')['pass']);
                if($flag['code'] != 1) {
                    writelog(0, '修改商品状态',"修改状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改商品状态',"上架成功。");
                return ajaxRetrun(2,'上架成功');
            }
            return json($flag);
        } catch (\Exception $e) {
            writelog(-1, '修改商品状态',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
    /*
     * 商品是否推送
     * */
    public function GoodsIspush()
    {
        try {
            $id = input('param.id');

            $goods_model = new GoodsModel();
            $where['id'] = $id;
            //获取当前记录信息
            $goods = $goods_model->getOneGoods($where);
            if ($goods['is_push'] == 1){//config('code.user_status')['pass']) {
                $flag = $goods_model->updateIspush($where, 0  );//config('code.user_status')['ban']);
                if($flag['code'] != 1) {
                    writelog(0, '修改商品推送状态',"修改状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改商品推送状态',"撤回成功。");
                return ajaxRetrun(2,'撤回成功');
            } else {
                $flag = $goods_model->updateIspush($where, 1 );//config('code.user_status')['pass']);
                if($flag['code'] != 1) {
                    writelog(0, '修改商品推送状态',"修改状态失败：{$flag['msg']}");
                    return json($flag);
                }
                writelog(1, '修改商品推送状态',"推送成功。");
                return ajaxRetrun(2,'推送成功');
            }
            return json($flag);
        } catch (\Exception $e) {
            writelog(-1, '修改商品推送状态',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
    /*
     *
     *
     *
     *
     *  商品类型模块
     *
     *
     *
     *
     * */
    public function type_index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['type_descr'] = ['like',"%" . $key . "%"];
        }
        $type_model = new GoodsTypeModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $type_model->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $type_model->getTypeByWhere($map, $Nowpage, $limits);
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
     * 添加
     */
    public function addType()
    {
        $type_model = new GoodsTypeModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $flag = $type_model->insertType($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $type = $type_model->getAllTypeByWhere();
        $this->assign('type' , $type);
        return $this->fetch();
    }

    /**
     * 编辑
     */
    public function editType()
    {
        $type_model = new GoodsTypeModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $type_model->editType($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $where['id'] = $id;
        $info = $type_model->getOneType($where);
        $type = $type_model->getAllType();
        $this->assign('info' , $info);
        $this->assign('type' , $type);
        return $this->fetch();
    }
    /*
     * 删除
     */
    public function delType() {

        try {
            $id = input('param.id');
            $goodstypt_model = new GoodsTypeModel();
            $where['id'] = $id;
            $pic = $goodstypt_model->getOneType($where);
            if($pic['pid']==0) {
                $wher1['id|pid'] = $id;
                $goodstypt_model->where($wher1)->delete();
                return modelReturn(1,'删除成功');
            }else{
                $path = ROOT_PATH . 'public' . DS . 'uploads/goods_type/' . $pic['path'];
                //var_dump($path);die;
                $reg = file_exists($pic['path']);
                if ($reg) {
                    unlink($path);
                    $flag = $goodstypt_model->delType($id);
                    return json($flag);
                } else {
                    $goodstypt_model->delType($id);
                    return ajaxRetrun(1, '图片不存在,已将数据强制删除');
                }
            }
        }catch ( \Exception $e) {
            writelog(-1, '删除类型',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }


    /*
     *
     *
     *
     *
     *  商品类型模块
     *
     *
     *
     *
     * */
    public function img_index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['t.id|g.name'] = ['like',"%" . $key . "%"];
        }
        $img = new GoodsImgModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $img->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $img->getImgByWhere($map, $Nowpage, $limits);
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
     * 添加
     */
    public function addImg()
    {
        $img = new GoodsImgModel();
        $goods_model = new GoodsModel();
        if(request()->isAjax()){
            $where = [];
            $param = input('post.');
            $param['create_time'] = time();
            $path =  explode(',', $param['path']);
            for($i = 1; $i < count($path); $i++){
                $where[$i-1] = array (
                    "path"=>$path[$i],
                    "goods_id"=>$param['goods_id'],
                    "create_time"=>$param['create_time']);
            }
            $flag = $img->insertImg($where);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $goods = $goods_model->getAllGoods();
        $this->assign('goods' , $goods);
        return $this->fetch();
    }

    /**
     * 编辑
     */
    public function editImg()
    {
        $img = new GoodsImgModel();
        $goods_model = new GoodsModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $img->editImg($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $where['t.id'] = $id;
        $data = $img->getOneData($where);
        $goods = $goods_model->getAllGoods();
        $this->assign('data' , $data);
        $this->assign('goods' , $goods);
        return $this->fetch();
    }
    /*
     * 删除
     */
    public function delImg() {

        try {
            $id = input('param.id');
            $img = new GoodsImgModel();
            $where['t.id'] = $id;
            $pic = $img->getOneData($where);
            $path = ROOT_PATH.'public'.$pic['path'];
            //var_dump($path);die;
            $reg = file_exists($pic['path']);
            if($reg){
                unlink($path);
                $flag = $img->delImg($id);
                return json($flag);
            }else{
                $img->delImg($id);
                return ajaxRetrun(1,'图片不存在,已将数据强制删除');
            }
        }catch ( \Exception $e) {
            writelog(-1, '删除类型',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
}