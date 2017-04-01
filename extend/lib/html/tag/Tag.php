<?php
namespace lib\html\tag;
/**
 * html标签php化
 * 根父类
 * @author Administrator
 *
 */
class Tag
{
    protected $width=0; //控件的宽
    protected $height=0;//控件的长
    protected $css = '';//css类
    protected $style = '';//自定义css样式
    protected $attr= null;//属性
    public $onclick= null;//属性
    public $ondblclick= null;//双击
    public $onkeydown= null;//键盘事件
    public $onmousedown= null;//鼠标事件
    public $onmousemove= null;//鼠标事件
    public $onmouseout= null;//鼠标事件
    public $onmouseover= null;//鼠标事件
    public $id = '';//id属性
    public $name = '';//名称属性
    public $content = null;
    protected $tag = 'body';
    private $version = '0.0.0';//版本信息
    //初始化
    public function __construct(){
        $this->height = 0;
        $this->width = 0;
        $this->css = '';
        $this->style="";
        $this->attr =array();
        $this->id="";
        $this->name="";
    }
    //设置属性
    public function getCss(){
        return $this->css;
    }
    public function getStyle(){
        return $this->style;
    }
    public function getAttr(){
        return $this->attr;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getHeight(){
        return $this->height;
    }
    public function setCss($value = ''){
        $this->css = $value;
    }
    public function setStyle($value = ''){
        $this->style = $value;
    }
    public function setAttr($value = ''){
        $this->attr = $value;
    }
    public function setWidth($value = ''){
        $this->width = $value;
    }
    public function setHeight($value = ''){
        $this->height = $value;
    }
    //标签开始
    protected function start(){
        return '<' . $this->tag .' ';
    }
    //绘画
    protected function draw(){
        $html = start();
        $html = attr($html);
        $html = emptAttr($html);
        $html = onEvent($html);
        $html = emptOnEvent($html);
        $html = content($html);
        $html = end($html);
        return $html;
    }
    //empt空方法
    protected function emptAttr($html){
        return $html;
    }
    //empt空方法
    protected function emptOnEvent($html){
        return $html;
    }

    //结束
    protected function end($html){
        
        return $html . '/' . $this->tag . '>';
    }
    //属性
    protected function attr($html){
        if(!empty($this->id)){
            $html = $html . 'id="' . $this->id . '" ';
        }
        if(!empty($this->name)){
            $html = $html . 'name="' . $this->name . '" ';
        }
        if(!empty($this->css)){
            $html = $html . 'class="' . $this->css . '" ';
        }
        $attr = $this->buildAttr();
        if(!empty($attr)){
            $html = $html . $attr;
        }
        if(!empty($this->style)){
            $html = $html . 'style="' . $this->style . '" ';
        }       
        return $html;
    }
    //内容
    protected function content($html){
        if(!empty($this->content)){
            $html = $html . ' >' . $this->content . '<';
        }
        return $html;
    }
    //事件
    protected function onEvent($html){
        if(!empty($this->onclick)){
            $html = $html . 'onclick="' . $this->onclick . '" ';
        }
        if(!empty($this->ondblclick)){
            $html = $html . 'ondblclick="' . $this->ondblclick . '" ';
        }
        if(!empty($this->onkeydown)){
            $html = $html . 'onkeydown="' . $this->onkeydown . '" ';
        }
        if(!empty($this->onmousedown)){
            $html = $html . 'onmousedown="' . $this->onmousedown . '" ';
        }
        if(!empty($this->onmousemove)){
            $html = $html . 'onmousemove="' . $this->onmousemove . '" ';
        }
        if(!empty($this->onmouseout)){
            $html = $html . 'onmouseout="' . $this->onmouseout . '" ';
        }
        if(!empty($this->onmouseover)){
            $html = $html . 'onmouseover="' . $this->onmouseover . '" ';
        }
        return $html;
    }
    //生成自定义属性
    protected function buildStyle(){
      if(count($this->style) == 0){return null;}
      $attr = null;
      foreach ($this->style as $key=>$value){
          if(empty($value)){
              continue;
          }
           $attr = $key . ":" . $value . "; ";
      }
      return $attr;  
    }
    //生成自定义属性
    protected function buildAttr(){
        if(count($this->attr) == 0){return null;}
        $attr = null;
        foreach ($this->attr as $key=>$value){
            if(empty($value)){
                continue;
            }
            $attr = $key . '="' . $value . '"  ';
        }
        return $attr;
    }
    
}

?>