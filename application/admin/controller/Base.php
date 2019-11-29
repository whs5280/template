<?php

namespace app\admin\controller;
use app\admin\model\Node;
use app\admin\model\ProjectLeaderModel;
use app\admin\model\WeChatUserModel;
use think\Controller;

class Base extends Controller
{
    public $user_info = [];
    public $wechar_user_info = [];
    //是否是管理员
    public $isAdmin = false;
    public function _initialize()
    {

        if(!session('uid')||!session('username')){
            $this->redirect('admin/login/index');
        }
        $user_info = [
            'org_num' =>729801,
            'user_uid'=>session('uid'),
            'user_username'=>session('username'),
        ];
        $wechat_user_info = [
            'wechatUser_id' => session('wechatUser_id'),
            'head_img' => session('head_img'),
            'nickname' => session('nickname')
        ];
//        $wechatUserModel = new WeChatUserModel();
        $this->user_info = $user_info;
        $this->wechar_user_info = $wechat_user_info;
        if ((session('yes_admin_login'))){
            $this->isAdmin = session('yes_admin_login');
        }
        $auth = new \com\Auth();   
        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;

//        print_r($url);exit;
        //跳过检测以及主页权限
//        if(session('uid')!=1){
//            if(!in_array($url, ['admin/index/index','admin/index/indexpage','admin/upload/upload','admin/upload/uploadface','admin/upload/uploadNeedsFile','admin/upload/uploadPrototypeImg','admin/upload/uploadUIImg','admin/upload/uploadFeedbackFile'])){
//
//                if(!$auth->check($url,session('uid'))){
//                    $this->error('抱歉，您没有操作权限');
//                }
////                $this->error('抱歉，您没有操作权限');
//            }
//        }
        
        $node = new Node();
        $this->assign([
            'uid'=> session('uid'),
            'username' => session('username'),
            'portrait' => session('portrait'),
            'rolename' => session('rolename'),
            'menu' => $node->getMenu(session('rule'))
        ]);

        $config = cache('db_config_data');

        if(!$config){            
            $config = load_config();                          
            cache('db_config_data',$config);
        }
        config($config); 

        if(config('web_site_close') == 0 && session('uid') !=1 ){
            $this->error('站点已经关闭，请稍后访问~');
        }

        if(config('admin_allow_ip') && session('uid') !=1 ){          
            if(in_array(request()->ip(),explode('#',config('admin_allow_ip')))){
                $this->error('403:禁止访问');
            }
        }

    }
}