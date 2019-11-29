<?php
/**
 * Created by PhpStorm.
 * User: cjj
 * Date: 19-3-2
 * Time: 上午11:46
 */
return [
    'password_pre_halt' => '_#uad360#_', //用户密码加密延
    'aes_key' => 'UAD_RH1234567890', //AES加密解密密钥，客户端和服务端需要保持一致(长度必须为16、24或则32位)
    'app_sign_time' => 1000000000000000, //sign失效时间
    'app_sign_cache_time' => 200, //sign缓存时间 (必须大于sign失效时间)
    'token_expand_time'  => '+7 day',//token延长时间
    //APP分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 5,
    ],
    //用户列表中，类型
    'like_user_type'    =>  [
        'no'    =>  0,  //没有关注
        'yes'   =>  1,  //关注了
        'mutual'    =>  2,  //相互关注
    ],

];