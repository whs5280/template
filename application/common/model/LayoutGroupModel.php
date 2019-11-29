<?php

namespace app\common\model;
use app\admin_released\controller\Layout;
use SebastianBergmann\RecursionContext\Exception;
use think\Model;
use think\Db;

class LayoutGroupModel extends Model
{
    protected $name = 'layout_group';
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据条件获取一条节目组信息
     * @param $where
     * @return array|false|\PDOStatement|string|Model
     */
    public function getOneGroup ($where = []) {
        return $this->where($where)->find();
    }

    /**
     * [updateLayoutGroup 编辑节目组]
     * @author [极客] [505413@qq.com]
     */
    public function updateLayoutGroup($param)
    {
        try{
            $param['update_time'] = time();
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if($result === false){
                writelog(config('code.log_status')['error'],'编辑节目组',"编辑【{$param['group_name']}】节目组");
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑节目组成功'];
            }

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    /**
     * 添加一个节目组
     */
    public function addOneGroup ($data) {
        try{
            $reslut = $this -> allowField(true)->save($data);
            if(false === $reslut){
                writelog(session('uid'),session('username'),'用户【'.session('username').'】添加节目组失败',2);
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(session('uid'),session('username'),'用户【'.session('username').'】添加节目组成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '添加节目组成功'];
            }
        } catch (\PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据条件获取节目组列表总数
     * @param array $map
     * @return int|string
     */
    public function getLayoutGroupCountByCondit ($map = []) {
        return $this->where($map)->count();
    }

    /**
     * 根据条件获取节目组列表，及排序，分页
     * @param array $map
     * @param $page
     * @param $pageSize
     * @param string $orderBy
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLayoutGroupByCondit ($map = [], $page, $pageSize, $orderBy='id ASC') {
        $map['Layout_group.is_del'] = config('code.is_del')['no'];
        return $this->view('Layout_group','*')
            ->view('layout',['layout'],'Layout_group.layout_id=layout.id','LEFT')
            ->where($map)
            ->page($page,$pageSize)
            ->order($orderBy)
            ->select();
    }

    /**
     * 删除一个节目组
     * @param id
     */
    public function delOneLayoutGroup ($id) {
        try{
            $where = ['id'=>$id];
            $result = $this->where($where)->delete();
            $layout = $this->getOneGroup($where);
            if($result === false){
                writelog(config('code.log_status')['error'],'删除节目组',"删除【{$layout['group_name']}】失败");
                return modelReturn(0,'删除节目组失败');
            }
            return ['code' => 1, 'data' => '', 'msg' => '删除节目组成功'];
            writelog(config('code.log_status')['success'],'删除节目组',"删除【{$layout['group_name']}】成功");
        }catch( \PDOException $e){
            writelog(config('code.log_status')['error'],'删除节目组',"删除【{$layout['group_name']}】成功");
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 软删除一个节目组
     * @param id
     */
    public function invalidOneLayoutGroup ($id) {
        try{
            $where = ['id'=>$id];
            $layout = $this->getOneGroup($where);
            $result = $this -> softDelLayoutGroup($where);
            if ($result === false) {
                writelog(config('code.log_status')['error'], '作废节目组',"作废【{$layout['group_name']}】失败");
                return modelReturn(0,'作废节目组失败');
            }
            writelog(config('code.log_status')['success'], '作废节目组',"作废【{$layout['group_name']}】成功");
            return ['code' => 1, 'data' => '', 'msg' => '作废节目组成功'];
        }catch( \PDOException $e){
            writelog(config('code.log_status')['error'], '作废节目组', $e->getMessage());
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 软删除节目组
     * @param array $where
     */
    public function softDelLayoutGroup($where = []) {
        $save['is_del'] = config('code.is_del')['yes'];
        return $this->save($save,$where);
    }

    /**
     * [getRole 获取角色的权限节点]
     * @author [极客] [505413@qq.com]
     */
    public function getLayoutById($id)
    {
        $res = $this->field('layout_id')->where('id', $id)->find();
        return $res['layout_id'];
    }

    /**
     * [editLayoutId 分配权限]
     * @author [极客] [505413@qq.com]
     */
    public function editLayoutId($param)
    {
        try{
            $this->save($param, ['id' => $param['id']]);
            return ['code' => 1, 'data' => '', 'msg' => '分配节目成功'];

        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}