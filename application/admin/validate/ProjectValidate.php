<?php

namespace app\admin\validate;
use think\Validate;

class ProjectValidate extends Validate
{
    protected $rule = [
        'pname'     =>  'require|max:50|token',
        'htstarttime'   =>  'require',
        'htendtime'   =>  'require',
        'fileurl' => 'require',

    ];
    protected $message = [
        'pname.require' =>  '项目名称不能为空',
//        'name.unique' =>  '板块名已存在',
        'pname.max' =>  '项目名称长度不能超过50',
        'pname.token' => '请不要重复提交表单',
        'htstarttime.require' =>  '合同开始时间不能为空',
        'htendtime.require' =>  '合同结束时间不能为空',
        'fileurl.require' =>  '需求文档不能为空',

    ];

//    protected $scene = [
//        'edit' => [
//            'name' => 'require|max:50|token',
//            'title' => 'require|max:255',
//            'plate_describe' => 'require'
//        ]
//    ];
}
