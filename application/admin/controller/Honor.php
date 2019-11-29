<?php

namespace app\admin\controller;
use app\admin\model\HonorModel;
use think\Cache;
use think\Db;

class Honor extends Base
{
    /*
     *
     * 荣誉列表
     * */
    public function index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['id|title'] = ['like',"%" . $key . "%"];
        }
        $honor = new HonorModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $honor->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $honor->getHonorByWhere($map, $Nowpage, $limits);
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
     * 编辑
     */
    public function editHonor(){
        $honor = new HonorModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $honor->editHonor($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $where['id']=$id;
        $info = $honor->getOneData($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }


    /**
     * 详情
     */
    public function Content_details()
    {
        $honor = new HonorModel();
        $id = input('param.id');
        $where['id']=$id;
        $info = $honor->getOneData($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }

    /**
     * 添加荣誉
     */
    public function addHonor()
    {
        $honor = new HonorModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $honor->insertHonor($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
    }

    /**
     * 删除
     */
    public function delHonor() {

        try {
            $id = input('param.id');
            $honor = new HonorModel();
            $where['id']=$id;
            $data = $honor->getOneData($where);
            $path =  explode(',', $data['path']);

            for($i = 1; $i<count($path); $i++){
                $reg = file_exists(ROOT_PATH.'public' .$path[$i]);
                if ($reg){
                    unlink(ROOT_PATH.'public' . $path[$i]);
                }
            }
            $flag = $honor->delHonor($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除类型',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
}