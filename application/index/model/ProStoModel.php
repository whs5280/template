<?php

namespace app\index\model;
use think\Model;
use think\Db;

class ProStoModel extends Model
{
    protected $name = 'pro_sto';
    protected $autoWriteTimestamp = true;   // 开启自动写入时间戳

    /**
     * 根据搜索条件获取菜品列表信息
     */
    public function getMenusByWhere($map)
    {
        return $this
            ->where($map)
            ->alias('pt')
            ->field('pt.*,pt.state st,pg.state sta,pg.group_name')
            ->join('think_product_group pg','pt.group_id = pg.id')
            ->select();
    }

    /**
     * 获取所有菜品
     * @param $where
     */
    public function getAllCount($map)
    {
        return $this->where($map)->count();
    }


    /**
     * 新增菜品
     */
    public function insertProductTetailed($param)
    {
        try{
            $param['create_time'] = date("Y-m-d H:i:s");
            $result = $this -> allowField(true)-> save($param);
            if($result){
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
            return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
        }catch( \PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
    public function editProductTetailed($param)
    {
        try{
            $param['update_time'] = date('Y-m-d H:i:s');
            $result =  $this->allowField(true)->save($param, ['id' => $param['id']]);
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
     * 根据Id获取产品信息
     * @param $id
     */
    public function getProductTetailed($id)
    {
        return $this->where('id', $id)->find();
    }


    public function delMenu($id)
    {
        try{
            $result = $this->where('id',$id)->delete();
            if($result){
                return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
            }
            return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
        }catch(\ PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


}