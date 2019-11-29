<?php

namespace app\common\validate;

use think\Validate;

class AdValidate extends Validate
{
    protected $rule = [
        ['title','require|max:20','标题不能为空|标题不能超过20个字符'],
        ['ad_position_id','require|number','请选择广告位|广告位参数错误'],
        ['start_time','require','开始日期不能为空'],
        ['end_time','require|gt:start_time','结束日期不能为空|结束日期必须大于开始日期'],
        ['orderby','require|number','排序不能为空|排序必须为数字'],
        ['images','require','请上传图片']
    ];
    protected $scene = [
        'edit'  =>  ['title','start_time','end_time','orderby','images'],
    ];
}