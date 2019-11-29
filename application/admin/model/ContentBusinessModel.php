<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ContentBusinessModel extends Model
{
    protected $name = 'content_business';
//    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($where = []) {
        return $this->where($where)->count();
    }

    /**
     * 获取文本内容
     */
    public function getOneContent()
    {
        return $this->find();
    }


    /**
     * 编辑信息
     * @param $param
     */
    public function editContent($param)
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




}