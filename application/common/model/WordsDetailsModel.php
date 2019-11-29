<?php

namespace app\common\model;
use think\Model;
use think\Db;

class WordsDetailsModel extends Model
{
    //定义model表名
    protected $name = 'words_details';

    /**
     * 插入一条作品内容
     * @param $data
     * @return int|string
     */
    public function addOneWordsContents($data) {
        return $this->allowField(true)->save($data);
    }

    /**
     * 插入多条作品内容
     * @param $data
     * @return int|string
     */
    public function addMoreWordsContents($data) {
        return $this->allowField(true)->saveAll($data);
    }

    public function words() {
        return $this->belongsTo('WordsModel','id');
    }

}