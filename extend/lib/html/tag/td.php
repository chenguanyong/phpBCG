<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class td extends Tag
{ 
    protected  $tag = 'td';
	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(){
        parent::__construct();             
    }		
    
}

?>