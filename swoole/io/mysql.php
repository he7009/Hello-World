<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2020/1/7
 * Time: 17:02
 */


$db = new swoole_mysql();
$server = array(
    'host' => '118.25.21.173',
    'port' => 3306,
    'user' => 'www',
    'password' => '123456',
    'database' => 'search',
    'charset' => 'utf8', //指定字符集
    'timeout' => 2,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
);

$db->connect($server, function (swoole_mysql $db, $r) {
    if ($r === false) {
        var_dump($db->connect_errno, $db->connect_error);
        die;
    }
    $sql = 'INSERT search_log (`level`,`category`,`log_time`,`prefix`,`message`) VALUES (1,"swoole insert","1577009638.2675","[192.168.33.1][-][-]","开心就好")';
    $db->query($sql, function(swoole_mysql $db, $r) {
        var_dump($r);
        if ($r === false)
        {
            var_dump($db->error, $db->errno);
        }
        elseif ($r === true )
        {
            var_dump($db->affected_rows, $db->insert_id);
        }
        $db->close();
    });
});