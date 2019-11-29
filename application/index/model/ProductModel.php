<?php

namespace app\index\model;
use think\Model;
use think\Db;

class ProductModel extends Model
{
    protected $name = 'product';
    protected $autoWriteTimestamp = true;   // 开启自动写入时间戳

    /**
     * 根据搜索条件获取菜品列表信息
     */
    public function getMenusByWhere($map,$Nowpage, $limits)
    {
        return $this
            ->where($map)
            ->field('think_product.*,ClassifyTag')
//            ->join('think_restaurant','think_menus.RestaurantId = think_restaurant.RestaurantId')
            ->join('think_product_group','think_product.ClassifyId = think_product_group.id')
            ->page($Nowpage, $limits)
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
     * 获取所有的产品
     */
    public function getProduct()
    {
        return $this->where('MenuState',0)->select();
    }

    /**
     * 新增菜品
     */
    public function insertProduct($param)
    {
        try{
            Db::startTrans();
            $result = $this->allowField(true)->save($param);
            $restaurant = Db::name('restaurant')->select();
            $data = [];
            foreach ($restaurant as $item){
                $params['MenuId'] = $param['MenuId'];
                $params['RestaurantId'] = $item['RestaurantId'];
                $data[] = $params;
            }
            $addStockInfo = Db::name('product_number')->insertAll($data);
            if($result && $addStockInfo){
                Db::commit();
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }else{
                Db::rollback();
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }
        }catch( \PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
    public function editProduct($param)
    {
        try{
            $param['MenuTime'] = date('Y-m-d H:i:s');
            $result =  $this->allowField(true)->save($param, ['MenuId' => $param['MenuId']]);
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
     * 根据MenuId获取菜品信息
     * @param $id
     */
    public function getMenu($id)
    {
        return $this->where('MenuId', $id)->find();
    }


    /**
     * 删除管理员
     * @param $id
     */
    public function delUser($id)
    {
        try{

            $this->where('id', $id)->delete();
            Db::name('auth_group_access')->where('uid', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function reUseMenu($id)
    {
        try{
            $map['MenuState']=0;
            $where['MenuId'] = $id;
//            $this->save($map, ['MenuId' => $id]);
            $this->where($where)->update($map);
            return ['code' => 1, 'data' => '', 'msg' => '恢复成功'];
        }catch(\ PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function stopMenu($id)
    {
        try{
            $map['MenuState']=1;
            $where['MenuId'] = $id;
//            $this->save($map, ['MenuId' => $id]);
            $this->where($where)->update($map);
            return ['code' => 1, 'data' => '', 'msg' => '停用成功'];
        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


    public function delMenu($id)
    {
        try{
            $map['MenuState']=2;
            $where['MenuId'] = $id;
//            $this->save($map, ['MenuId' => $id]);
            $this->where($where)->update($map);
            return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
        }catch(\ PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


}