<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class form extends Tag
{ 
    protected  $tag = 'form';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }    
}

?>