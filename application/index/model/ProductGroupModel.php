<?php

namespace app\index\model;
use think\Model;
use think\Db;

class ProductGroupModel extends Model
{
    protected $name = 'product_group';
//    protected $autoWriteTimestamp = true;   // 开启自动写入时间戳

    /**
     * 根据条件获取全部数据
     */
    public function getAll($map,$Nowpage, $limits)
    {
        return $this
            ->where($map)
            ->field('think_product_group.*')
            ->page($Nowpage,$limits)
            ->order('id asc')
            ->select();
    }


    /**
     * 根据条件获取所有数量
     */
    public function getAllCount($map)
    {
        return $this->where($map)->count();
    }

    /**
     * 获取所有的菜品分类
     */ 
    public function getGroup()
    {
        return $this->select();
    }


    /**
     * 插入信息
     */
    public function insertGroup($param)
    {
        try{
//            $where['RestaurantId'] = $param['RestaurantId'];
//            $restaurantInfo = Db::name('restaurant')->field('RestaurantNo')->where($where)->find();

            $result =  $this->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( \PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     */
    public function editGroup($param)
    {
        try{
            $result =  $this->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
            }
        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据id获取一条信息
     */
    public function getOne($id)
    {
        return $this->where('id', $id)->find();
    }


    /**
     * 删除信息
     */
    public function delGroup($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
        }catch(\ PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}