<?php
/*
 * 入口文件
 * 1，定义常量
 * 2，加载函数库
 * 3，启动框架
 * */
define('IMOOC',realpath('D:/www/qcl/shop'));
define('CORE',IMOOC.('/core'));
define('APP',IMOOC.('/app'));
define('DEBUG',false);//true开启debug
if (DEBUG) {
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
//加载函数库
include CORE.'/common/function.php';
include CORE.'/imooc.php';//加载框架的核心文件

spl_autoload_register('\core\imooc::load');//当我们new的类不存在时，就会触发load方法
\core\imooc::run();//调用run方法




















