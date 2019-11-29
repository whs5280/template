<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class HomepageAdvertiseModel extends Model
{
    protected $name = 'homepage_advertise';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)
            ->field('t.*,g.name,g.url')
            ->alias('t')
            ->join('goods g','t.goods_id=g.id','LEFT')
            ->count();
    }


    /**
     * 根据搜索条件获取列表信息
     *
     */
    public function getAdvertiseByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('t.*,g.name,g.url')
            ->alias('t')
            ->join('goods g','t.goods_id=g.id','LEFT')
            ->page($Nowpage, $limits)
            ->order('t.id desc')
            ->select();
    }

    /**
     * 获取商品
     */
    public function getAllGoods()
    {
        return Db::name('goods')
            ->field('g.*,gt.type_descr')
            ->alias('g')
            ->join('goods_type gt','g.type_id = gt.id')
            ->select();
    }

    /**
     * 获取商品
     */
    public function getOneGoods($where)
    {
        return Db::name('goods')
            ->Field('gt.type_descr,g.*')
            ->where($where)
            ->alias('g')
            ->join('goods_type gt','g.type_id = gt.id','LEFT')
            ->find();
    }
    /**
     * 通过id获取一条advertise
     */
    public function getOneAdvertise($where)
    {
        return $this->where($where)->find();
    }
    /**
     * 插入信息
     * @param $param
     */
    public function insertAdvertise($param)
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
    public function editAdvertise($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);

            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑商品成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    /**
     * 删除信息
     * @param $id
     */
    public function delAdvertise($id)
    {
        try{
            $where = ['id'=>$id];
            $goods = $this->getOneAdvertise($where);
            if(!$goods) {
                return modelReturn(0,'广告不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除广告',"删除广告失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除广告',"删除广告成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除广告', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }



}