<?php
namespace lib\email;

interface PHPEmail
{
    /***
     * 连接Email服务器
     */
    public function connect();
    /***
     * 关闭Email服务器
     */
    public function close();
}

?>