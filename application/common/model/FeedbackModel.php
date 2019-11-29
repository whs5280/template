<?php

namespace app\common\model;
use think\Model;
use think\Db;

class FeedbackModel extends Model
{
    //定义model表名
    protected $name = 'project_detail';

    public function addFeedback($data) {
        return $this->allowField(true)->save($data);
    }


}