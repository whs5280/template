<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class HonorModel extends Model
{
    protected $name = 'honor';
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
    public function getHonorByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('h.*')
            ->alias('h')
            ->page($Nowpage, $limits)
            ->order('h.id desc')
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
    public function insertHonor($param)
    {
        $result = $this->allowField(true)->save($param);
        if(false === $result){
            return modelReturn(0,$this->getError());
        }else{
            return modelReturn(1,'添加成功');
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
    public function editHonor($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);

            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 删除
     * @param $id
     */
    public function delHonor($id)
    {
        try{
            $where = ['id'=>$id];
            $join = $this->getOneData($where);
            if(!$join) {
                return modelReturn(0,'荣誉不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除荣誉',"删除荣誉失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除荣誉',"删除荣誉成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除荣誉', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }

}