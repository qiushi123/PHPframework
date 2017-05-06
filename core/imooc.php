<?php
namespace core;//命名空间
class imooc
{
    public static $classMap = array();//临时变量，避免重复引入

    public static function run()
    {
        p("ok");
        $route=new \core\lib\route();
        p($route);
    }

    public static function load($class)
    {//自动加载类
        if (isset($classMap[$class])) {//数组中存在，就不再引入
            return true;
        } else {
            $class = str_replace('\\', '/', $class);//用/替换\
            $file = IMOOC . '/' . $class . '.php';
            p($file);
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}