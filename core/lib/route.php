<?php
namespace core\lib;
class route//路由分发
{
    public $ctrl;//控制器
    public $action;//方法
    public function __construct()//初始化方法
    {
        /*
         * 路由分发
         * 1，隐藏index.php 通过在 .htaccess配置实现
         * 2，获取到url的参数
         * 3，返回对应的控制器和方法
         * */
        $path = $_SERVER['REQUEST_URI'];
        if (isset($path) && $path != '/') {
            //http://www.qcl.com/index/index
            $pathArr=explode('/',trim($path,'/'));//得到index/index字符串
            if (isset($pathArr[0])) {
                $this->ctrl=$pathArr[0];
            }
            if (isset($pathArr[1])) {
                $this->action=$pathArr[1];
            } else {
                $this->action='index';
            }
        } else {
            $this->ctrl='index';
            $this->action='index';
        }
    }
}