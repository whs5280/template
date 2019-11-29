<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class PrivatesOrderModel extends Model
{
    protected $name = 'privates_order';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)
            ->field('c.*,u.username,u.nick,u.sex,u.mobile,u.email')
            ->alias('c')
            ->join('user u','c.user_id=u.id','LEFT')
            ->count();
    }
    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getOrderByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('c.*')
            ->alias('c')
            ->page($Nowpage, $limits)
            ->order('c.id desc')
            ->select();
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
     * 根据id获取一条信息
     * @param $id
     */
    public function getOneOrder($where)
    {
        return $this->where($where)
            ->field('c.*')
            ->alias('c')
            ->order('c.id desc')
            ->find();
    }
    /**
     * 删除信息
     * @param $id
     */
    public function delOrder($id)
    {
        try{
            $where = ['id'=>$id];
            $data = $this->getOneOrder($where);
            if(!$data) {
                return modelReturn(0,'订单不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除定制',"删除定制订单失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除定制',"删除定制订单成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除定制', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }

}