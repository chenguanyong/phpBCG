<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class i extends Tag
{ 
    protected  $tag = 'i';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }    
}

?>