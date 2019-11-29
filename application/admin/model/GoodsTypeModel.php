<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class GoodsTypeModel extends Model
{
    protected $name = 'goods_type';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)->count();
    }

    /**
     * 根据搜索条件获取列表信息
     */
    public function getTypeByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('t.*')
            ->alias('t')
            ->page($Nowpage, $limits)
            ->order('t.id desc')
            ->select();
    }

    /**
     * 插入信息
     * @param $param
     */
    public function insertType($param)
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
    public function editType($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);

            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑类型成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据id获取一条信息
     * @param $id
     */
    public function getOneType($where)
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
        return $this->select();
    }

    /**
     * 获取所有type值
     * @param $id
     */
    public function getAllTypeByWhere()
    {
        $where['pid'] = 0;
        return $this
            ->where($where)
            ->select();
    }



    /**
     * 删除信息
     * @param $id
     */
    public function delType($id)
    {
        try{
            $where = ['id'=>$id];
            $goods = $this->getOneType($where);
            if(!$goods) {
                return modelReturn(0,'用户类型不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除类型',"删除类型失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除类型',"删除类型成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除类型', $e->getMessage());
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