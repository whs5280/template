<?php

namespace app\common\model;
use think\Model;
use think\Db;

class DeviceStateModel extends Model
{
    //定义model表名
    protected $name = 'device_state';

    /**
     * 根据条件获取一条设备信息
     * @param $where
     * @return array|false|\PDOStatement|string|Model\
     */
    public function getOneDevice($where) {
        return $this->where($where)->find();
    }
}