<?php

namespace app\common\validate;

use think\Validate;

class CommentVaildate extends Validate
{
    protected $rule = [
        ['user_id', 'require|number', '评论者必须|user_id无效'],
        ['words_id', 'require|number', '作品必须|user_id无效'],
        ['content', 'require|max:255', '评论内容必须|评论内容过长'],
        ['parent_id', 'number', '评论对象无效'],
    ];

}