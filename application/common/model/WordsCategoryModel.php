<?php

namespace app\common\model;
use think\Model;
use think\Db;

class WordsCategoryModel extends Model
{
    //定义model表名
    protected $name = 'words_category';

    public function getCategorys() {
        $where['status'] = config('code.words_category_status')['open'];
        return $this->where($where)->field(['id','title'])->select();
    }

    public function getOneCategory ($where = []) {
        return $this->where($where)->find();
    }


}