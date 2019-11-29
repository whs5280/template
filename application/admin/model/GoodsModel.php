<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class GoodsModel extends Model
{
    protected $name = 'goods';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)
            ->field('g.*,gt.type_descr')
            ->alias('g')
            ->join('goods_type gt','g.type_id=gt.id','LEFT')
            ->count();
    }

    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getGoodsByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('g.*,gt.type_descr')
            ->alias('g')
            ->join('goods_type gt','g.type_id=gt.id','LEFT')
            ->page($Nowpage, $limits)
            ->order('g.id desc')
            ->select();
    }

    /**
     * 插入信息
     * @param $param
     */
    public function insertGoods($param)
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
    public function editGoods($param)
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
     * 根据id获取一条信息
     * @param $id
     */
    public function getOneGoods($where)
    {
        return $this->where($where)->find();
    }



    /**
     * 根据id获取Goods_type中的type_descr
     * @param $id
     */
    public function getJoinData($where)
    {
        return Db::table('goods')
                ->alias('g')
                ->field('g.*,gt.type_descr')
                ->join('goods_type gt','g.type_id=gt.id','LEFT')
                ->where($where)
                ->find();
    }
    /**
     * 获取所有type值
     * @param $id
     */
    public function getAllType()
    {
        return Db::table('goods_type')->select();
    }

    /**
     * 获取商品
     */
    public function getAllGoods()
    {
        return $this
            ->field('g.*,gt.type_descr')
            ->alias('g')
            ->join('goods_type gt','g.type_id = gt.id')
            ->select();
    }

    /**
     * 删除信息
     * @param $id
     */
    public function delGoods($id)
    {
        try{
            $where = ['id'=>$id];
            $goods = $this->getOneGoods($where);
            if(!$goods) {
                return modelReturn(0,'产品不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除产品',"删除产品【{$goods['name']}】失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除产品',"删除产品【{$goods['name']}】成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除产品', $e->getMessage());
            return modelReturn(-1, $e->getMessage());
        }
    }

    /**
     * 获取用户状态
     * @param array $where
     * @return mixed
     */
    public function getStatus ($where = []) {
        return $this->where($where)->value('status');
    }

    /**
     * 修改用户状态
     * @param array $where
     * @param $status
     * @return array
     */
    public function updateIsup ($where = [], $status ) {
        $result = $this->where($where)->setField('is_up', $status);
        if ($result === false) {
            return modelReturn(0, $this->getError());
        }
        return modelReturn(1, '修改成功');
    }
    public function updateIspush ($where = [], $status ) {
        $result = $this->where($where)->setField('is_push', $status);
        if ($result === false) {
            return modelReturn(0, $this->getError());
        }
        return modelReturn(1, '修改成功');
    }

    /**
     * 获取器（修改用户头像地址）
     * @param $value
     * @return false|string
     */
    public function getHeadImgAttr($value) {
        $head_img = return_http_url($value);
        return $head_img;
    }


}