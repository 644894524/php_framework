<?php

//控制器管理类，模板引擎

namespace core;


class Controller {

    private $smarty;
    private $config;

    public function __construct () {
        //加载配置文件
        if( is_null( $this->config ) ) {
            config::load (APP_PATH . 'common/config.php');
            $this->config = config::get ('theme');
        }
    }

    /**
     * 模板显示
     * @param string $templateFile  指定要调用的模板文件
     * @param string $charset   模板编码
     *
     */
    final public function display($templateFile = '', $charset = '') {
        $charset = $charset ?: $this->config['charset'];
        header( 'Content-type: text/html; charset='.$charset );
        if( is_null( $this->smarty ) ){
            $this->__init();
        }
        $templateFile = $templateFile ?: ROUTE_A;
        $templateFile = ROUTE_M . DIRECTORY_SEPARATOR .ROUTE_C . DIRECTORY_SEPARATOR . $templateFile . '.html';
        $this->smarty->display( $templateFile );
    }

    /**
     * 模板分配变量
     * @param $name 变量名称
     * @param string $value 变量内容
     */
    final public function assign($name, $value ) {
        if( is_null( $this->smarty ) ){
            $this->__init();
        }
        $this->smarty->assign( $name, $value );
        return $this->smarty;
    }

    /**
     * 加载smartty 配置
     */
    private function __init(){
        $smarty = new \Smarty();
        $smarty->cache_lifetime = $this->config['lifetime'];
        $smarty->cache_dir = TPL_CACHE . 'cache';
        $smarty->compile_dir = TPL_CACHE . 'template_c';
        $smarty->template_dir = TPL_PATH . $this->config['name'];
        $smarty->debugging = $this->config['debug'];
        $this->smarty = $smarty;
        return $this->smarty;
    }

    /**
     * @param $msg 消息类型
     * @param $time 停留时间
     */
    final protected function success( $msg, $time ){

    }

    /**
     * @param $msg 消息类型
     * @param $time 停留时间
     */
    final protected function error( $msg, $time ){

    }

}
