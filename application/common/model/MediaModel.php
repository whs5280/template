<?php

namespace app\common\model;
use think\Model;
use think\Db;

class MediaModel extends Model
{
    //定义model表名
    protected $name = 'media';

    public function getMediaCountByCondit($map, $Nowpage, $limits){

        return $this->where($map)->page($Nowpage, $limits)->order('mediaID desc')->select();
    }



}