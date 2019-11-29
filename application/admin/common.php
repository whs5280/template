<?php
use think\Db;

/**
 * 将字符解析成数组
 * @param $str
 */
function parseParams($str)
{
    $arrParams = [];
    parse_str(html_entity_decode(urldecode($str)), $arrParams);
    return $arrParams;
}

function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
    if(is_array($arrays)){
        foreach ($arrays as $array){
            if(is_array($array)){
                $key_arrays[] = $array[$sort_key];
            }else{
                return false;
            }
        }
    }else{
        return false;
    }
    array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
    return $arrays;
}

/**
 * 二维数组根据某key值去重
 * @param $array
 * @return array
 */
function array_unset_tt($arr,$key){
    //建立一个目标数组
    $res = [];
    foreach ($arr as $value) {
        //查看有没有重复项

        if(isset($res[$value[$key]])){
            //有：销毁
            unset($value[$key]);
        }
        else{
            $res[$value[$key]] = $value;
        }
    }
    $onlyArr = [];
    foreach ($res as $item){
        $onlyArr[] = $item;
    }
    return $onlyArr;
}


/**
 * 子孙树 用于菜单整理
 * @param $param
 * @param int $pid
 */
function subTree($param, $pid = 0)
{
    static $res = [];
    foreach($param as $key=>$vo){

        if( $pid == $vo['pid'] ){
            $res[] = $vo;
            subTree($param, $vo['id']);
        }
    }
    return $res;
}


/**
 * 记录日志
 * @param  [type] $uid         [用户id]
 * @param  [type] $username    [用户名]
 * @param  [type] $description [描述]
 * @param  [type] $status      [状态]
 * @return [type]              [description]
 */
function writelog($status, $title, $description = '')
{

    $data['admin_id'] = session('uid');
    $data['admin_name'] = session('username');
    $data['title'] = $title;
    $data['description'] = $description;
    $data['status'] = $status;
    $data['ip'] = request()->ip();
    $data['add_time'] = time();
    $log = Db::name('Log')->insert($data);
}


/**
 * 整理菜单树方法
 * @param $param
 * @return array
 */
function prepareMenu($param)
{
    $parent = []; //父类
    $child = [];  //子类

    foreach($param as $key=>$vo){

        if($vo['pid'] == 0){
            $vo['href'] = '#';
            $parent[] = $vo;
        }else{
            $vo['href'] = url($vo['name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach($parent as $key=>$vo){
        foreach($child as $k=>$v){

            if($v['pid'] == $vo['id']){
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);
    return $parent;
}

/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $size >= 1024 && $i < 5; $i++) {
        $size /= 1024;
    }
    return $size . $delimiter . $units[$i];
}

function ajaxRetrun ($code , $msg, $data = [], $httpCode=200) {
    $return  = [
        'code'  =>  $code,
        'msg'   =>  $msg,
        'data'  =>  $data
    ];
    return json($return,$httpCode);
}

//
function generateTree($array){
    //第一步 构造数据
    $items = array();
    foreach($array as $value){
        $items[$value['id']] = $value;
    }
    //第一步很容易就能看懂，就是构造数据，现在咱们仔细说一下第二步
    $tree = array();
    //遍历构造的数据
    foreach($items as $key => $value){
        //如果pid这个节点存在
        if(isset($items[$value['pid']])){
            //把当前的$value放到pid节点的son中 注意 这里传递的是引用 为什么呢？
            $items[$value['pid']]['son'][] = &$items[$key];
        }else{
            $tree[] = &$items[$key];
        }
    }
    return $tree;
}

function getTree1($array, $pid =0, $level = 0){

    //声明静态数组,避免递归调用时,多次声明导致数组覆盖
    static $list = [];
    foreach ($array as $key => $value){
        //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
        if ($value['pid'] == $pid){
            //父节点为根节点的节点,级别为0，也就是第一级
            $value['level'] = $level;
            //把数组放到list中
            $list[] = $value;
            //把这个节点从数组中移除,减少后续递归消耗
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            getTree1($array, $value['id'], $level+1);

        }
    }
    return $list;
}
function genTree($items){
    $tree = array();
    foreach ($items as $item){
        if(isset($items[$item['pid']])){
            $items[$item['pid']]['son'][] = &$items[$item['id']];
        }else{
            $tree[] = &$items[$item['id']];
        }
    }
    return $tree;
}

//替换文件内容
function replaceStr($path,$ename,$brand_id){
    if (file_exists($path)){
        $str = file_get_contents($path);//将整个文件内容读入到一个字符串中
        $str = str_replace('Demo',$ename,$str);
        $str = str_replace('$demo_id','$brand_id',$str);
        $str = str_replace('demo_id_num',$brand_id,$str);
        return $str;
    }else{
        return false;
    }
}

//字符串写入文件
function writeFile($path,$str){
    $fp = fopen($path,'w');
    fwrite($fp,$str);
    fclose($fp);
}

//显示状态中文信息
function showStatus($num) {
    $status = '';
    switch ($num) {
        case 0:
            $status = "待立项";
            break;
        case 1:
            $status = "待立项(等待工程师评估)";
            break;
        case 2:
            $status = "待立项(已评估)";
            break;
        case 3:
            $status = "开发中";
            break;
        case 4:
            $status = "待交接";
            break;
        case 5:
            $status = "已交接";
            break;
        case 6:
            $status = "已完成";
            break;
    }
    return $status;
}

//二维数组排序，$arr是数据，$keys是排序的健值，$order是排序规则，1是降序，0是升序
function array_sort($arr,$keys,$order=0){
    if(!is_array($arr)){
        return false;
    }
    if (!$arr){
        return [];
    }
    $keysvalue=array();
    foreach($arr as $key => $val){
        $keysvalue[$key] = $val[$keys];
    }
    if($order == 0){
        asort($keysvalue);
    }else{
        arsort($keysvalue);
    }
    reset($keysvalue);
    foreach($keysvalue as $key => $vals){
        $keysort[$key] = $key;
    }
    $new_array=array();
    foreach($keysort as $key=> $val){
        $new_array[$key]=$arr[$val];
    }
    return$new_array;
}

//json批量转数组
function jsonToArr($arr){
    $_arr = [];
    foreach ($arr as $k=>$v){
        $_arr[$k] = json_decode($v,true);
    }
    return $_arr;
}
