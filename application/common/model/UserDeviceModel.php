<?php

namespace app\common\model;
use think\Model;
use think\Db;

class UserDeviceModel extends Model
{
    //定义model表名
    protected $name = 'user_device';

    /**
     * 根据条件获取一条设备信息
     * @param $where
     * @return array|false|\PDOStatement|string|Model\
     */
    public function findUserDevice($where) {
        return $this->where($where)->find();
    }

    /**
     * 用户绑定设备
     * @param $data
     * @return int|string
     */
    public function bindDevice($data) {
        return $this->insert($data);
    }

    /**
     * 用户解绑设备
     * @param $where
     * @return int
     */
    public function unBindDevice($where){
        return $this->where($where)->delete();
    }

    /**
     * 根据用户ID获取，用户拥有的设备列表总数
     * @param $user_id
     * @return bool|false|\PDOStatement|string|\think\Collection
     */
    public function getUserDevicesCount($user_id){
        $count = $this->alias('ud')
            ->join('think_device d','ud.device_id=d.device_id')
            ->where('ud.user_id',$user_id)->count();
        return $count;
    }

    /**
     * 根据用户ID获取，用户拥有的设备列表
     * @param $user_id
     * @return bool|false|\PDOStatement|string|\think\Collection
     */
    public function getUserDevices($user_id, $page, $size){
        $fields = 'ud.device_id,ud.user_id,d.device_name';
        $list = $this->alias('ud')
            ->join('think_device d','ud.device_id=d.device_id')
            ->where('ud.user_id',$user_id)
            ->order('ud.create_time DESC')
            ->field($fields)
            ->page($page,$size)
            ->select();
        return $list;
    }

    /**
     * 根据设备ID获取绑定的所有用户
     * @param $device_id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getUserIdsByDev ($device_id) {
        $where = [
            'device_id' =>  $device_id,
        ];
        return $this->where($where)->column('user_id');
    }

    public function getDeviceId ($where) {
        return $this->where($where)->value('device_id');
    }
}