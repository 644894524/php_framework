<?php

//model 数据库操作类

namespace core;
use Illuminate\Database\Capsule\Manager as Capsule;

class Model{
    public static $config = 'default';
    public function __construct () {
        $capsule = new Capsule;
        config::load (APP_PATH . 'common/config.php');
        $database = config::get ('database');
        $capsule->addConnection ($database[self::$config]);
        $capsule->bootEloquent ();
    }

}
