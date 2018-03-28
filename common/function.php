<?php
/**
 * 过滤url参数
 * @param $arr  $_POST,$_REQUEST
 * @param $name 参数名称
 * @param $def 默认值
 * @param bool $ishml
 */
function get_par( &$arr, $name, $def, $ishtml = true ){
    if( isset( $arr[$name] ) ){
        if( is_array( $arr[$name] ) ){
            foreach ( $arr[$name] as $k => $v ){
                $arr[$name][$k] = get_par( $arr[$name], $k, '', $ishtml );
            }
        }else if( is_string( $arr[$name] ) ){
            $arr[$name] = trim( $arr[$name] );
        }

        $string = $arr[$name] ?? $def;
        $string = $ishtml ? strip_tags( $string ) : $string;
        return $string;
    }
    return $def;
}

/**
 * 打印数组信息
 * @param $arr
 */
function dump( $arr ){
    echo "<pre>";
    print_r( $arr );
    echo "</pre>";
}
