<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class span extends Tag
{ 
    protected function $tag = 'span';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>