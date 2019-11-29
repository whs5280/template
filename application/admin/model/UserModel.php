<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class UserModel extends Model
{
    protected $name = 'user';
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
    public function getUserByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)
            ->field('u.*')
            ->alias('u')
            ->page($Nowpage, $limits)
            ->order('u.id desc')
            ->select();
    }
    /**
     * 根据条件获取列表信息
     * @param $where
     * @param $Nowpage
     * @param $limits
     */
    public function getAdAll($map, $Nowpage, $limits)
    {
        return $this->field('ad.*,name')
            ->join('ad_position', 'ad.ad_position_id = ad_position.id')
            ->where($map)->page($Nowpage,$limits)
            ->order('orderby desc')
            ->select();
    }

    /**
     * 插入信息
     * @param $param
     */
    public function insertUser($param)
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
    public function editUser($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);

            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据id获取一条信息
     * @param $id
     */
    public function getOneUser($where)
    {
        return $this->where($where)->find();
    }



    /**
     * 删除信息
     * @param $id
     */
    public function delUser($id)
    {
        try{
            $where = ['id'=>$id];
            $user = $this->getOneUser($where);
            if(!$user) {
                return modelReturn(0,'用户不存在');
            }
            $result = $this->where($where)->delete();
            if (!$result) {
                writelog(0, '删除用户',"删除【{$user['name']}】失败：{$this->getError()}");
                return modelReturn(0,'删除失败');
            }
            writelog(1, '删除用户',"删除【{$user['name']}】成功");
            return modelReturn(1,'删除成功');
        }catch( \Exception $e){
            writelog(-1, '删除用户', $e->getMessage());
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
    public function updateStatus ($where = [], $status) {
        $result = $this->where($where)->setField('status', $status);
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