<?php

namespace apps\home;

class index extends \core\Controller {

    public function index(){

        $address = array(
            array('id'=>1  , 'address'=>'安徽' , 'parent_id' => 0),
            array('id'=>2  , 'address'=>'江苏' , 'parent_id' => 0),
            array('id'=>3  , 'address'=>'合肥' , 'parent_id' => 1),
            array('id'=>4  , 'address'=>'庐阳区' , 'parent_id' => 3),
            array('id'=>5  , 'address'=>'大杨镇' , 'parent_id' => 4),
            array('id'=>6  , 'address'=>'南京' , 'parent_id' => 2),
            array('id'=>7  , 'address'=>'玄武区' , 'parent_id' => 6),
            array('id'=>8  , 'address'=>'梅园新村街道', 'parent_id' => 7),
            array('id'=>9  , 'address'=>'上海' , 'parent_id' => 0),
            array('id'=>10 , 'address'=>'黄浦区' , 'parent_id' => 9),
            array('id'=>11 , 'address'=>'外滩' , 'parent_id' => 10),
            array('id'=>12 , 'address'=>'安庆' , 'parent_id' => 1)
        );

        $menu = $this->get_menu( $address );
        $menu = $this->ger_parentids( $address, 8 );
        var_dump( $menu );

        $this->assign( 'name', 'sunlong' )->assign( 'age', 28 );
        $this->display();
    }


    public function second(){
        echo "<br/>";
        echo APP_URL;


        $arr = [ 'name' => 'sunlong', 'age' => '27', 'birthday' => '19901020' ];
        foreach( $arr as $k => $v ){
            if( $k == 'name' ){
                $arr[$k] = 'tianshi';
            }
        }

        var_dump( $arr );exit;
    }


    private function get_menu( $arr, $pid = 0, $step = 0 ){
        static $str = '';
        foreach( $arr as $key => $v ){
            if( $pid == $v['parent_id'] ){
                $flg = str_repeat ( '└―', $step );
                $str .= '<div style="height: 30px;line-height: 30px">'. $flg.$v['address'] . '</div>';
                $this->get_menu( $arr, $v['id'], $step + 1 );
            }
        }

        return $str;
    }


    private function ger_parentids( $arr ,$id ){
        static $parentIds = [] ;
        $parent_id = array_column( $arr, 'id' );
        $parent_id = array_search( $id, $parent_id );
        $parent_id = $arr[ $parent_id ][ 'parent_id' ];
        foreach( $arr as $key => $v ){
            if( $v[ 'id' ] === $parent_id ){
                $parentIds [] = $v['id'];
                $this->ger_parentids( $arr, $v[ 'id' ] );
            }
        }

        return $parentIds;
    }

}