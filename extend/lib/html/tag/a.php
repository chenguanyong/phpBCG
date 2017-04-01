<?php
namespace lib\html\tag;
use lib\html\tag\Tag;
class a extends Tag
{ 
    protected  $tag = 'a';
    public  $href = null;
    public function __construct(){
        parent::__construct();
        $this->href = '#';
    }
    protected function emptAttr($html){
        if(!empty($this->href)){
            $html = $html . 'href="' . $this->href . '" ';
        }
        return $html;
    }
    //重画
    public function reDraw(){
        $html = parent::start();
        $html = parent::attr($html);
        $html = self::emptAttr($html);
        $html = parent::onEvent($html);
        $html = parent::emptOnEvent($html);
        $html = parent::content($html);
        $html = parent::end($html);
        return $html;
    }
  
}

?>