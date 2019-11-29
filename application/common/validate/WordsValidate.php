<?php

namespace app\common\validate;

use think\Validate;

class WordsValidate extends Validate
{
    protected $rule = [
        ['title', 'require|max:255', '作品名称不能为空|作品名称过长'],
        ['remark', 'require', '作品描述不能为空'],
        ['category_id', 'require|number', '作品类别不能为空|作品类别必须是数字'],
        ['is_overt', 'require|check_is_overt', 'is_overt不能为空'],
    ];
    // 自定义验证规则
    protected function check_is_overt($value,$rule,$data)
    {
        $result = in_array($value,config('code.words_is_overt'));
        return $result ? true : "is_overt无效";
    }
}