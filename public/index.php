<?php

/**
 * 框架入口文件
 * > php 7.0
 * @author sunlong
 *
 */
if (version_compare ( PHP_VERSION, '7.0.0', '<' )) {
    die ( 'require PHP > 7.0 !' );
}

include dirname( __FILE__ ) . '/../vendor/autoload.php';
$app = new core\Bootstrap();
$app->init();
