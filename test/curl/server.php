<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/16
 * Time: 6:38
 */

include __DIR__ . "/../vender/log.php";

if (!function_exists('getallheaders')) {
    function getallheaders(){
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

echo "Hello 早晨好";

$cookie = var_export($_COOKIE, true);
$get = var_export($_GET, true);
$post = var_export($_POST, true);
$server = var_export($_SERVER, true);
$files = var_export($_FILES, true);

$header = var_export(getallheaders(), true);

$input = file_get_contents("php://input");

log::write($cookie, 'info');

log::write($header, 'info');

log::write(urldecode($input),'info');

log::write($get,'info');

log::write($post,'info');

log::write($server,'info');

log::write($files,'info');
