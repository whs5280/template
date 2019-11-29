<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class JoinReleaseModel extends Model
{
    protected $name = 'join_release';
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
    public function getReleaseByWhere($map, $Nowpage, $limits)
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
    public function insertRelease($param)
    {
        $result = $this->allowField(true)->save($param);
        if(false === $result){
            return modelReturn(0,$this->getError());
        }else{
            return modelReturn(1,'添加成功');
        }
    }


    /**
     * 编辑
     * @param $param
     */
    public function editRelease($param)
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
    public function delRelease($id)
    {
        try{
            $where = ['id'=>$id];
            $release = $this->getOneData($where);
            if(!$release) {
                return modelReturn(0,'信息不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除发布信息',"删除发布信息失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除发布信息',"删除发布信息成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除信息', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }

}