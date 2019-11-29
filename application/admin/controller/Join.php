<?php

namespace app\admin\controller;
use app\admin\model\JoinModel;
use app\admin\model\JoinReleaseModel;
use think\Cache;
use think\Db;

class Join extends Base
{
    /*
     *
     * 招商列表
     * */
    public function index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['cp_name|mobile|email|qq|addr'] = ['like',"%" . $key . "%"];
        }
        $join = new JoinModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $join->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $join->getJoinByWhere($map, $Nowpage, $limits);
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
     * 详情
     */
    public function Content_details()
    {
        $join = new JoinModel();
        $id = input('param.id');
        $where['id']=$id;
        $info = $join->getOneData($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }

    /**
     * 删除
     */
    public function delJoin() {

        try {
            $id = input('param.id');
            $join = new JoinModel();
            $flag = $join->delJoin($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除招商信息',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }



    /*
     *
     *
     *
     *
     *  招商发布模块
     *
     *
     *
     *
     * */
    public function release_index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['title|mobile|email|qq'] = ['like',"%" . $key . "%"];
        }
        $release = new JoinReleaseModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $release->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $release->getReleaseByWhere($map, $Nowpage, $limits);
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
     * 详情
     */
    public function Release_details()
    {
        $release = new JoinReleaseModel();
        $id = input('param.id');
        $where['id']=$id;
        $info = $release->getOneData($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }

    /**
     * 添加
     */
    public function addRelease()
    {
        $release = new JoinReleaseModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['create_time'] = time();
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $release->insertRelease($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
    }

    /**
     * 编辑
     */
    public function editRelease()
    {
        $release = new JoinReleaseModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $release->editRelease($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $where['id'] = $id;
        $data = $release->getOneData($where);
        $this->assign('data' , $data);
        return $this->fetch();
    }
    /**
     * 删除
     */
    public function delRelease() {

        try {
            $id = input('param.id');
            $release = new JoinReleaseModel();
            $where['id']=$id;
            $data = $release->getOneData($where);
            $path =  explode(',', $data['path']);
            for($i = 1; $i<count($path); $i++){
                $reg = file_exists(ROOT_PATH.'public' .$path[$i]);
                if($reg){
                    unlink(ROOT_PATH.'public' . $path[$i]);
                }
            }
            $flag = $release->delRelease($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除类型',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }
}