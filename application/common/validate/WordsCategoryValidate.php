<?php

namespace app\common\validate;

use think\Validate;

class WordsCategoryValidate extends Validate
{
    protected $rule = [
        ['title', 'require|unique:words_category', '请输入分类名称|分类已存在'],
    ];
}