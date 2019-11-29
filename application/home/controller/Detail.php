<?php
namespace app\home\controller;
use app\home\model\DetailModel;
use think\Db;

class Detail extends Base
{
    public function index()
    {
    	$id = input('param.id');
    	//dump($id);
        $model = new DetailModel();
        $detail = $model->getDetail($id);
        if($detail['photo']){
            $detail['photo'] = explode(',',$detail['photo']);
            foreach ($detail['photo'] as &$v){
                $v = return_http_url('box/'.$v);
            }
        }

        $detail['create_time'] = date('Y/m/d H:i',$detail['create_time']);
       //dump($detail);exit;
        $up = Db::name('article')->where('views !=0 AND id <' . $id)->order('id desc')->limit(1)->find();
        $down = Db::name('article')->where('views !=0 AND id >' . $id)->order('id')->limit(1)->find();
        $this->assign('detail',$detail);
        $this->assign('up',$up);
        $this->assign('down',$down);
        return $this->fetch();
    }
}
