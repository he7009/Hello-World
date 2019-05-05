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
        echo $classname . "<br />";
        $classname = str_replace('\\', '/', $classname);
        echo $classname . '<br />';
        if (strpos($classname, '/') !== false) {
            $namespace_path = substr($classname, 0, strpos($classname, '/'));
            echo $namespace_path . "<br />";
            $classname = isset(self::$rootPath[$namespace_path]) ? self::$rootPath[$namespace_path] . substr($classname, strpos($classname, '/')) : BASEPATH . '/' . $classname;
        }
        $path = $classname . '.php';
        echo $path . "<br />";
        if (is_file($path)) {
            include $path;
        }
    }

    public function start()
    {
        $r = \helper::request()->resoleRequest();
        call_user_func_array(['controller' . '\\' . $r[0] . 'Controller', $r[1]], []);
        die;
    }

}