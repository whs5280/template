<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class GoodsImgModel extends Model
{
    protected $name = 'goods_img';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)
            ->field('t.*,g.name')
            ->alias('t')
            ->join('goods g','t.goods_id=g.id','LEFT')
            ->count();
    }

    /**
     * 根据搜索条件获取列表信息
     */
    public function getImgByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('t.*,g.name')
            ->alias('t')
            ->join('goods g','t.goods_id=g.id','LEFT')
            ->page($Nowpage, $limits)
            ->order('t.id desc')
            ->select();
    }

    /**
     * 插入信息
     * @param $param
     */
    public function insertImg($param)
    {
        $result = $this->allowField(true)->saveAll($param);
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
    public function editImg($param)
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
     * 根据id获取一条信息
     * @param $id
     */
    public function getOneData($where)
    {
        return $this->where($where)
            ->field('t.*,g.name')
            ->alias('t')
            ->join('goods g','t.goods_id=g.id','LEFT')
            ->find();
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
        return $this->select();
    }



    /**
     * 删除信息
     * @param $id
     */
    public function delImg($id)
    {
        try{
            $where = ['id'=>$id];
            $where1 = ['t.id'=>$id];
            $goods = $this->getOneData($where1);
            if(!$goods) {
                return modelReturn(0,'图片不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除图片',"删除失败：{$this->getError()}");
                return modelReturn(0,'删除图片失败');
            }
            writelog(1, '删除图片',"删除成功");
            return modelReturn(1,'删除图片成功');
        }catch( \Exception $e){
            writelog(-1, '删除图片', $e->getMessage());
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