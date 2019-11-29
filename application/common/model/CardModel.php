<?php

namespace app\common\model;
use think\Model;
use think\Db;

class CardModel extends Model
{
    //定义model表名
    protected $name = 'card_number';
    protected $autoWriteTimestamp = false;

    public function getAllCount($map)
    {
        return $this->where($map)->count();
    }

    public function getBrandByList($map,$Nowpage, $limits)
    {
        return $this
            ->where($map)
            ->alias('c')
            ->field('c.*')
            ->page($Nowpage, $limits)
            ->order('id desc')
            ->select();
    }



}