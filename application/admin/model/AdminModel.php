<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class AdminModel extends Model
{
    protected $name = 'admin';
    protected $autoWriteTimestamp = true;   // 开启自动写入时间戳

    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getAdminsByWhere($map,$Nowpage, $limits)
    {
//        $map['ad.status'] = 1;
        return $this
            ->where($map)
            ->alias('ad')
            ->field('ad.*,ag.title')
            ->join('auth_group ag', 'ag.id = ad.groupid','LEFT')
            ->page($Nowpage, $limits)
            ->order('ad.id desc')
            ->select();
    }
    /**
     * 获取用户列表信息
     */
    public function getUsers($where = [])
    {
//        $map['ad.status'] = 1;
        return $this
            ->where($where)

            ->select();
    }
    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllUsers($where)
    {
        return $this->where($where)->count();
    }

    /**
     * 插入管理员信息
     * @param $param
     */
    public function insertAdmin($param)
    {
        try{
            $result = $this->validate('UserValidate')->allowField(true)->save($param);
            if(false === $result){
                writelog(0,'添加后台用户',"用户【{$param['username']}】添加失败:{$this->getError()}");
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(1,'添加后台用户',"用户【{$param['username']}】添加成功");
                return ['code' => 1, 'data' => '', 'msg' => '添加用户成功'];
            }
        }catch( \Exception $e){
            writelog(0,'添加后台用户',"用户【{$param['username']}】添加失败:{$e->getMessage()}");
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑管理员信息
     * @param $param
     */
    public function editAdmin($param)
    {
        try{
            $result =  $this->validate('UserValidate')->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){
                writelog(0, '编辑后台用户', "用户编辑失败：{$this->getError()}");
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(1, '编辑后台用户', "用户【{$param['username']}】编辑成功。");
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        }catch( \Exception $e){
            writelog(0, '编辑后台用户', "用户【{$param['username']}】编辑失败：{$e->getMessage()}");
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


    /**
     * 根据管理员id获取角色信息
     * @param $id
     */
    public function getOneAdmin($id)
    {
        return $this->where('id', $id)->find();
    }


    /**
     * 删除管理员
     * @param $id
     */
    public function delAdmin($id)
    {
        try{
            $this->where('id', $id)->delete();
            Db::name('auth_group_access')->where('uid', $id)->delete();
            writelog(1,'删除后台用户',"删除ID={$id}后台用户成功");
            return ['code' => 1, 'data' => '', 'msg' => '删除用户成功'];
        }catch( \Exception $e){
            writelog(1,'删除后台用户',"删除ID={$id}后台用户失败:{$e->getMessage()}");
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}