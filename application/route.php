<?php
use think\Route;
//设置APP分享的网页地址路由
Route::rule('shared/:id/:uid','app/shared/index');