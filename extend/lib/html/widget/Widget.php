<?php
namespace lib\html\widget;
/**
 * 基于bootstrap的控件php模板
 * @author Administrator
 *
 */
class Widget
{
    protected $width=0; //控件的宽
    protected $height=0;//控件的长
    protected $css = '';//css类
    protected $style = '';//自定义css样式
    protected $attr= null;//属性
    protected $id = '';//id属性
    protected $name = '';//名称属性
    protected $data = null;//数据对象
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
    
    //绘画
    protected function draw(){}
    
    
}

?>