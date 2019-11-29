<?php

namespace app\admin\controller;
use app\admin\model\AdminModel;
use app\admin\model\LogModel;
use app\admin\model\ProjectLeaderModel;
use app\admin\model\ProjectModel;
use think\Config;
use think\Controller;
use think\Loader;
use think\Db;

class Indexpage extends Controller
{
    /**
     * [indexPage 后台首页]
     * @return [type] [description]
     */
    public function indexPage(){
        //今日新增用户
        $today = strtotime(date('Y-m-d 00:00:00'));//今天开始日期
        $map['create_time'] = array('egt', $today);
        $user = Db::name('user')->where($map)->count();
        $this->assign('user', $user);

        $info = array(
            'web_server' => $_SERVER['SERVER_SOFTWARE'],
            'onload'     => ini_get('upload_max_filesize'),
            'think_v'    => THINK_VERSION,
            'phpversion' => phpversion(),
        );

        $this->assign('info',$info);
        return $this->fetch('index/index');
    }

}
