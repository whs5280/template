<?php
/**
 * Created by PhpStorm.
 * User: uad
 * Date: 18-3-23
 * Time: 下午2:31
 */

namespace app\common\lib;

class Time {

    /**
     * 获取13位时间戳
     * @return string
     */
    public static function get13TimeStamp(){
        //0.17798300 1521791065
        list($t1,$t2) = explode(' ',microtime());
        $t1 = ceil($t1 * 1000 ) >= 100 ? ceil($t1 * 1000 ) : '0' . ceil($t1 * 1000 );
        return $t2 . $t1;
    }
}