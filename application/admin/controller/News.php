<?php

namespace app\admin\controller;
use app\admin\model\NewsModel;
use think\Cache;
use think\Db;

class News extends Base
{
    /*
     *
     * 咨询模块
     *
     *
     * */
    public function index(){

        $key = input('key');
        $map = [];
        if($key && $key !== "")
        {
            $map['title|id'] = ['like',"%" . $key . "%"];
        }
        $news = new NewsModel();
        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = Cache::get('db_config_data')['list_rows'];// 获取总条数
        $count = $news->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $news->getNewsByWhere($map, $Nowpage, $limits);
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
    public function addNews()
    {
        $news = new NewsModel();
        if(request()->isAjax()){

            $param = input('post.');
            $param['create_time'] = time();
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $news->insertNews($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
    }


    /**
     * 编辑
     */
    public function editNews()
    {
        $news = new NewsModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['content']= htmlspecialchars_decode($param['content']);
            $flag = $news->editNews($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $where['id']=$id;
        $data = $news->getOneData($where);

        $this->assign('data' , $data);
        return $this->fetch();
    }


    /**
     * 删除
     */
    public function delNews() {

        try {
            $id = input('param.id');
            $news = new NewsModel();
            $where['id']=$id;
            $data = $news->getOneData($where);
            $path =  explode(',', $data['path']);

            for($i = 1; $i<count($path); $i++){
                $reg = file_exists(ROOT_PATH.'public' .$path[$i]);
                if ($reg){
                    unlink(ROOT_PATH.'public' . $path[$i]);
                }
            }
            $flag = $news->delNews($id);
            return json($flag);
        }catch ( \Exception $e) {
            writelog(-1, '删除用户',  $e->getMessage());
            return ajaxRetrun(-1, '系统出错，请查看日志。');
        }
    }

    /**
     * 详情
     */
    public function Content_details()
    {
        $news = new NewsModel();
        $id = input('param.id');
        $where['id']=$id;
        $info = $news->getOneData($where);
        $this->assign('data' , $info);
        return $this->fetch();
    }

}