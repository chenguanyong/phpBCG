<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class select extends Tag
{ 
    protected  $tag = 'select';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>