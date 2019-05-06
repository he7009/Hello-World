<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/6
 * Time: 6:34
 */

namespace duanyude\core;


class core
{
    private $defaultNamespace = 'controller';

    public static $rootPath = [
        'controller' => CONTROLLER,
    ];

    public static function autoload($classname)
    {
        $classname = str_replace('\\', '/', $classname);
        if (strpos($classname, '/') !== false) {
            $namespace_path = substr($classname, 0, strpos($classname, '/'));
            $classname = isset(self::$rootPath[$namespace_path]) ? self::$rootPath[$namespace_path] . substr($classname, strpos($classname, '/')) : BASEPATH . '/' . $classname;
        }
        $path = $classname . '.php';
        if (is_file($path)) {
            include $path;
        }
    }

    public function start()
    {
        //开启错误显示
        ini_set('display_errors', 1);
        ini_set('error_reporting',E_ALL);

        //设置时区
        ini_set('date.timezone','Asia/Shanghai');


        $r = \helper::request()->resoleRequest();
        $controller_name = $this->defaultNamespace . '\\' . $r[0] . 'Controller';
        $controller_obj = new $controller_name();
        call_user_func_array([$controller_obj, $r[1]], []);
        exit;
    }

}