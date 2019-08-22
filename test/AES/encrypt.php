<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/22
 * Time: 22:19
 */

function aesEncryptByKey($data, $key, $iv,$method = 'AES-128-CBC')
{
    $data = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
    $data = base64_encode($data);
    return $data;
}

/**
 * @AES 对称加密泰隆示例
 * @param $data
 * @param $key
 * @param $iv
 * @return string
 */
function aesEncryptByKeyT($data,$key,$iv)
{
    $module = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $iv);
    @mcrypt_generic_init($module, $key, $iv);
    $block = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $pad = $block - (strlen($data) % $block);
    $data .= str_repeat(chr($pad), $pad);
    $encrypted = @mcrypt_generic($module, $data);
    @mcrypt_generic_deinit($module);
    @mcrypt_module_close($module);

    return base64_encode($encrypted);
}

function aesDecryptByKey($data, $key, $iv,$method = 'AES-256-CBC')
{
    $data = base64_decode($data);
    $data = openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
    return $data;
}

$array = [
    'name' => 'duanyude',
    'age' => '23',
    'addr' => 'shanghai',
    'sss' => '2222222'
];

$arrayStr = json_encode($array, JSON_UNESCAPED_UNICODE);
$key = strtoupper(md5("duanyudehelilanhahahahahahhaha"));
$iv = 'abcdefghABCDEFGH';

echo "加密结果为：" . aesEncryptByKey($arrayStr,$key,$iv,"AES-256-CBC") . PHP_EOL;
echo "加密结果为：" . aesEncryptByKeyT($arrayStr,$key,$iv) . PHP_EOL;
echo "解密结果为：" . aesDecryptByKey(aesEncryptByKeyT($arrayStr,$key,$iv),$key,$iv) . PHP_EOL;