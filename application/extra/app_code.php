<?php
/**
 * 接口状态码定义
 * Created by PhpStorm.
 * User: uad
 * Date: 18-3-23
 * Time: 上午12:50
 */
return [
    'success'   => 0,//成功
    'fail'     => -1,//失败，以及提示
    'is_register' => -2,//更新失败，更新内容与原内容一样
    'sign_error'    => -401, //接口密钥错误
    'token_overdue'   => -303, //密钥是否过期或错误
    'http_mothed_error'  => -101,//请求方式错误
    'data_no_exist'  => -404,//请求方式错误

    'likes_user_success'  => 100, //关注用户成功
    'dislikes_user_success'   => 101, //取消关注用户成功
    'mutual_likes_success'   => 102, //互相关注成功

    'likes_words_success'   => 103, //关注作品成功
    'dislikes_words_success'   => 104, //取消关注作品成功

    'comment_zan_success'   => 105, //点赞成功
    'comment_unzan_success'   => 106, //取消点赞成功

    'user_exist'    =>  107,//帐号存在
    'user_noexist'  =>  108,//帐号不存在

    'no_bind_device'  =>  109,//没有绑定设备
];
