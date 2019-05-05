<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/5
 * Time: 22:39
 */

//网站根目录
define("BASEPATH", __DIR__);

//网站应用目录
define("APPLICATION", BASEPATH . '/application');

//控制器目录
define("CONTROLLER", BASEPATH . '/application/controller');

//网站日志缓存目录
define("RUNTIME", BASEPATH . '/runtime');

//网站模板目录
define("VIEW", BASEPATH . '/runtime');

//核心应用目录
define("DUANYUDE", BASEPATH . '/duanyude');

include DUANYUDE . '/core/core.php';
include DUANYUDE . '/core/helper/helper.php';
spl_autoload_register(['duanyude\core\core', 'autoload']);

(new duanyude\core\core())->start();