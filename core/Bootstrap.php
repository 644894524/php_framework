<?php
/**
 *
 * mvc 加载类
 */
namespace core;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

class Bootstrap {

    public function __construct () {
        define( 'ROUTE_M', \get_par( $_REQUEST, 'm', 'Home' ) ); //模块
        define( 'ROUTE_C', \get_par( $_REQUEST, 'c', 'Index' ) );    //控制器
        define( 'ROUTE_A', \get_par( $_REQUEST, 'a', 'Index' ) );    //方法
    }

    public function init(){
        if( file_exists( APP_PATH . '/apps/' . strtolower( ROUTE_M ) . '/' . strtolower( ROUTE_C ) . '.php' ) === false ){
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        $this->project_init();
        $class = sprintf( "\apps\%s\%s", strtolower( ROUTE_M ), strtolower( ROUTE_C ) );
        $action = strtolower( ROUTE_A );
        return ( new $class )->$action();
    }

    private function project_init(){
        if( defined( 'ERROR_INFO' ) === true ){
            error_reporting( ERROR_INFO );
        }

        if( defined( 'SESSION_INFO' ) === true ){
            session_start( SESSION_INFO );
        }

        //初始化Eloquent
        config::load (APP_PATH . 'common/config.php');
        $database = config::get ('database');

    }

}