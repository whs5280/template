<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class JoinModel extends Model
{
    protected $name = 'join';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)->count();
    }

    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getJoinByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('j.*')
            ->alias('j')
            ->page($Nowpage, $limits)
            ->order('j.id desc')
            ->select();
    }
    /**
     * 根据id得到一条数据
     */
    public function getOneData($where){
        return $this->where($where)->find();
    }

    /**
     * 插入信息
     * @param $param
     */
    public function insertData($param)
    {
        $result = $this->allowField(true)->save($param);
        if(false === $result){
            return modelReturn(0,$this->getError());
        }else{
            return modelReturn(1,'添加成功');
        }
    }
    /**
     * 删除
     * @param $id
     */
    public function delJoin($id)
    {
        try{
            $where = ['id'=>$id];
            $join = $this->getOneData($where);
            if(!$join) {
                return modelReturn(0,'信息不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除信息',"删除招商信息失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除信息',"删除招商信息成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除信息', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }

}