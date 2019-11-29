<?php

return [
    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/home/css',
        '__JS__'  => '/static/home/js',
        '__IMG__' => '/static/home/images',

    ),

    'http_exception_template' => [
        // 定义404错误的重定向页面地址
        404 => APP_PATH.'admin/view/public/404.html',
        // 还可以定义其它的HTTP status
        401 => APP_PATH.'admin/view/public/401.html',
    ],
];
