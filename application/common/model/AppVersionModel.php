<?php

namespace app\common\model;
use think\Model;
use think\Db;

class AppVersionModel extends Model
{
    //定义model表名
    protected $name = 'app_version';

    public function getAppVersion ($app_name) {
        $where = [
            'app_name'  => $app_name,
            'is_enable' =>  config('code.version_is_enable')['yes']
        ];
        return $this->where($where)->order('version_int DESC')->find();

    }

    public function insertVersion ($data) {
        try{
            $result =  $this->allowField(true)->save($data);
            if(false === $result){
                writelog(config('code.log_status')['error'],'发布应用版本',"应用【{$data['app_name']}】版本发布失败:{$this->getError()}");
                return modelReturn(0,$this->getError());
            }else{
                writelog(config('code.log_status')['success'],'发布应用版本',"应用【{$data['app_name']}】版本发布成功");
                return modelReturn(1,'发布应用版本成功');
            }
        }catch( \Exception $e){
            writelog(config('code.log_status')['error'],'发布应用版本',"应用【{$data['app_name']}】版本发布失败:{$e->getMessage()}");
            return modelReturn(-1,$e->getMessage());
        }
    }
}