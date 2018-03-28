<?php

define( 'APP_PATH', dirname( __FILE__ ) . '/../' );  //入口文件所在目录
define( 'APP_STATIC', APP_PATH . 'public/' );   //项目目录
define( 'ERROR_INFO', E_ALL ^ E_NOTICE );   //自定义错误信息

define( 'APP_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/' );   //项目url
define( 'APP_DEBUG', true );
/**
 * 模板配置相关
 */
define( 'TPL_PATH', APP_PATH . 'template/' );   //模板文件所在目录
define( 'TPL_CACHE', APP_PATH . 'caches/' );    //模板引擎缓存目录
