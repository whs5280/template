<?php

namespace app\admin\model;
use think\Model;

class MenuModel extends Model
{
    protected $name = 'auth_rule';
    protected $dateFormat = 'Y-m-d H:i:s';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;


    /**
     * [getAllMenu 获取全部菜单]
     */
    public function getAllMenu()
    {
        return $this->order('id asc')->select();       
    }


    /**
     * [insertMenu 添加菜单]
     */
    public function insertMenu($param)
    {
        try{
            $param['create_time'] = time();
            $result = $this->save($param);
            if(false === $result){            
                writelog(session('uid'),session('username'),'用户【'.session('username').'】添加菜单失败',2);
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(session('uid'),session('username'),'用户【'.session('username').'】添加菜单成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '添加菜单成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [editMenu 编辑菜单]
     */
    public function editMenu($param)
    {
        try{
            $result =  $this->save($param, ['id' => $param['id']]);
            if(false === $result){
                writelog(session('uid'),session('username'),'用户【'.session('username').'】编辑菜单失败',2);
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(session('uid'),session('username'),'用户【'.session('username').'】编辑菜单成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '编辑菜单成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneMenu 根据菜单id获取一条信息]
     */
    public function getOneMenu($id)
    {
        return $this->where('id', $id)->find();
    }



    /**
     * [delMenu 删除菜单]
     */
    public function delMenu($id)
    {
        try{
            $this->where('id', $id)->delete();
            writelog(1,"删除菜单",'用户【'.session('username').'】删除菜单成功',1);
            return ['code' => 1, 'data' => '', 'msg' => '删除菜单成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}