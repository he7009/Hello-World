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

$header = var_export(getallheaders(), true);

log::write($cookie, 'info');

log::write($header, 'info');
