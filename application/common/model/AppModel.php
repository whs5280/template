<?php

namespace app\common\model;
use think\Model;
use think\Db;

class AppModel extends Model
{
    //定义model表名
    protected $name = 'app';

    public function getApps ($where) {
        return $this->where($where)->select();
    }

    /**
     * 获取所有应用的最新版本
     * @param $where
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAppsLatestVer ($where) {
        $app_max_ver_table = Db::name('app_version')
            ->field(['app_name','max(version_int)'=>'version_int'])
            ->where('is_enable',config('code.version_is_enable')['yes'])
            ->group('app_name')
            ->buildSql();
        $app_max_ver_info_table = Db::table('think_app_version v')
            ->field('v.*')
            ->join($app_max_ver_table.' v1','v.app_name=v1.app_name and v.version_int=v1.version_int')
            ->buildSql();
        $app_info = $this->alias('a','*')
            ->join($app_max_ver_info_table.' v2','a.id=v2.app_id')
            ->where($where)
            ->select();
        return $app_info;
    }


}