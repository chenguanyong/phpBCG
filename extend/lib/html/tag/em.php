<?php
namespace lib\html\tag;

class em extends Tag
{ 
   protected  $tag = 'em';
 	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }   
}

?>