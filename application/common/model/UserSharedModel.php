<?php

namespace app\common\model;
use think\Model;
use think\Db;

class UserSharedModel extends Model
{
    //定义model表名
    protected $name = 'user_shared';

    public function addOneUserShared ($data) {
        return $this->allowField(true)->save($data);
    }

}