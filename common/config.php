<?php

/**
 *
 * 项目配置文件
 */

return [

    //模板相关
    'theme' => [
        'name' => 'default',    //主题名称
        'charset' => 'UTF-8',
        'lifetime' => -1,   //缓存期
        'debug' => true,
        'cache_dir' => 'cache', //模板缓存目录
        'compile_dir' => 'template_c'   //模板编译目录
    ],

    //数据库
    'database' => [
        'default' => [
            'db_name' => 'blog',
            'db_port' => '3306',
            'db_host' => 'localhost',
            'db_prefix' => 'blog_',
            'db_user' => 'root',
            'db_pwd' => '',
            'db_charset' => 'utf-8'
        ]
    ],

    //缓存
    'redis' => [
        '127.0.0.1:9736'
    ],

    'memcache' => [
        '127.0.0.1:11211'
    ],

    'session' => [
        'name' => 'PHPSESSID',
        'save_path' => '/Users/apple/session',
        'save_handler' => 'files',
        'cookie_lifetime' => 86400
    ]
];

