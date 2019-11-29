<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class HomepageTitleModel extends Model
{
    protected $name = 'title';
//    protected $dateFormat = 'Y-m-d H:i:s';


    public function getTitle()
    {
        return $this->find();
    }



    /**
     * 编辑信息
     * @param $param
     */
    public function editTitle($param)
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