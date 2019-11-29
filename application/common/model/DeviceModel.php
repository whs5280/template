<?php

namespace app\common\model;
use think\Exception;
use think\Model;
use think\Db;

class DeviceModel extends Model
{
    //定义model表名
    protected $name = 'device';

    /**
     * 根据条件获取一条设备信息
     * @param $where
     * @return array|false|\PDOStatement|string|Model\
     */
    public function getOneDevice($where) {
        return $this->where($where)->find();
    }


    /**
     * 根据条件获取一条设备信息,包括用户信息
     */
    public function getOneDeviceInfo($where){
        return $this
            ->field('d.*,dc.ClassifyName,u.nickname,u.account,ug.group_name')
            ->alias('d')
            ->where($where)
            ->join('think_user_device ud','ud.device_id=d.device_id','LEFT')
            ->join('think_user u','u.id = ud.user_id','LEFT')
            ->join('think_user_group ug','ug.id = u.group_id','LEFT')
            ->join('think_device_classify dc','dc.id = d.group_id','LEFT')
            ->find();
    }

    /**
     * 根据设备id查询该设备已经注册
     */
    public function checkDeviceIsRegister($id){
        return $this->where('device_id',$id)->find();
    }

    /**
     * 根据设备id修改设备信息
     */
    public function updateDevice($params){
        try{
            $params['create_time'] = time();
            $result =  $this->allowField(true)->save($params, ['device_id' => $params['device_id']]);
            if(false === $result){
                writelog(config('code.operation')['fail'],'更新设备信息失败','更新设备信息失败原因：'.$this->getError());
                return ['code'=>-1,'data'=>'','msg'=>'更新设备信息失败'];
            }
            return ['code'=>1,'data'=>'','msg'=>'更新设备信息成功'];
        }catch( Exception $e){
            writelog(config('code.operation')['fail'],'更新设备信息失败','更新设备信息失败原因：'.$e->getMessage());
            return ['code'=>-1,'data'=>'','msg'=>'更新设备信息失败'];
        }
    }

    /**
     *注册新设备
     */
    public function insertDevice($params){
        try{
            $params['create_time'] = time();
            $result =  $this->allowField(true)->save($params);
            if(!$result){
                writelog(config('code.operation')['fail'],'注册设备失败','注册设备失败原因：'.$this->getError());
                return ['code'=>-1,'data'=>'','msg'=>'注册设备失败'];
            }
            return ['code'=>1,'data'=>$result,'msg'=>'注册成功'];
        }catch( Exception $e){
            writelog(config('code.operation')['fail'],'注册设备失败','注册设备失败原因：'.$e->getMessage());
            return ['code'=>-1,'data'=>'','msg'=>'注册设备失败'];
        }
    }

    /**
     * 获取设备是否允许更新
     */
    public function getDeviceIsUpdate ($where) {
        return $this->where($where)->value('is_update');
    }
}