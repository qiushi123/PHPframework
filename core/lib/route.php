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
            //http://www.qcl.com/index/index/id/111/name/qcl
            $pathArr = explode('/', trim($path, '/'));//得到index/index字符串
            if (isset($pathArr[0])) {
                $this->ctrl = $pathArr[0];
                unset($pathArr[0]);//为了获取/id/111/name/qcl 把/index/index从字符串数组移除
            }
            if (isset($pathArr[1])) {
                $this->action = $pathArr[1];
                unset($pathArr[1]);//为了获取/id/111/name/qcl 把/index/index从字符串数组移除
            } else {
                $this->action = 'index';
            }
            //url移除/index/index后获取多余部分/id/111/name/qcl 转换为get请求
            $count = count($pathArr) + 2;//因为id/11是成对出现的，所以这里是2
            $i = 2;
            while ($i < $count) {
                if (isset($pathArr[$i + 1])) {
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
            p($_GET);//打印获取到的get值
        } else {
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}