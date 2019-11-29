<?php

namespace app\common\validate;

use think\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        ['account', 'require', '请填写用户名'],
        ['password', 'require', '请填写密码'],
        ['nickname','require|length:2,20','请填写昵称|昵称必须为2-20个字符'],
        ['sex','require|in:男,女,','请填写昵称|性别无效'],
        ['remark','max:40','签名不能超过40个字符'],
    ];
    protected $scene = [
        'login'  =>  ['account','password'],
        'apiEdit'  =>  ['nickname','sex','remark'],
    ];
}