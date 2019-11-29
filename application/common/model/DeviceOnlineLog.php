<?php

namespace app\common\model;
use think\Model;
use think\Db;

class DeviceOnlineLog extends Model
{
    //定义model表名
    protected $name = 'device_online_log';

    /*
     * 根据条件获取设备日志总数
     */
    public function getCountByCondit ($where) {
        try {
            return $this -> where($where) -> count();
        } catch (PDOException $exception) {
            //抛出一个PDO异常
            throw new Exception('PDO:' . $exception->getMessage());
        }
    }

    /**
     * 根据条件分页排序获取多条设备日志数据
     * @param $where
     * @param $page
     * @param $pageSize
     * @param $orderBy
     */
    public function getMoreByCondit ($where, $page, $pageSize, $orderBy) {
        try {
            return $this -> where($where) -> page($page, $pageSize) -> order($orderBy) -> select();
        } catch (PDOException $exception) {
            //抛出一个PDO异常
            throw new Exception('PDO:' . $exception->getMessage());
        }
    }

    /**
     * 添加一条记录
     */
    public function addOne ($data) {
        $result =  $this->allowField(true)->save($data);
        return $result;
    }

    public function getStartTimeAttr ($value) {
        return date('Y-m-d H:i:s', $value);
    }
    public function getEndTimeAttr ($value) {
        return date('Y-m-d H:i:s', $value);
    }
}