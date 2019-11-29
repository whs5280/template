<?php

namespace app\common\model;
use think\Model;
use think\Db;

class AdModel extends Model
{
    //定义model表名
    protected $name = 'ad';

    public function getAds() {
        $time = time();
        $where['is_del'] = config('code.is_del')['no'];
        $where['ad_position_id'] = 1;
        $where['status'] = config('code.ad_status')['open'];
        $where['start_time'] = ['elt',$time];
        $where['end_time'] = ['gt',$time];
        return $this->where($where)->order('orderby ASC')->field(['images','link_url'])->select();
    }

    public function getImagesAttr ($value) {
        return return_http_url($value);
    }

}