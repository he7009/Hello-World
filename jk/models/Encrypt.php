<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/22
 * Time: 6:46
 */

namespace app\models;


use yii\base\Model;

class Encrypt extends Model
{
    /**
     * @RSA 私钥加密
     * @param $data
     * @param $privateKey
     * @param int $padding
     * @return string
     */
    public static function rsaEncryptByPrivateKey($data,$privateKey,$padding = OPENSSL_PKCS1_PADDING)
    {
        openssl_private_encrypt($data,$encrypted,$privateKey,$padding);
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * @RSA 公钥解密
     * @param $data
     * @param $publicKey
     * @param int $padding
     * @return mixed
     */
    public static function rsaDecryptByPublicKey($data,$publicKey,$padding = OPENSSL_PKCS1_PADDING)
    {
        $data = base64_decode($data);
        openssl_public_decrypt($data,$decrypted,$publicKey,$padding);
        return $decrypted;
    }

    /**
     * @AES 对称加密
     * @param $data
     * @param $key
     * @param $iv
     * @param string $method
     * @return string
     */
    public static function aesEncryptByKey($data, $key, $iv,$method = 'AES-256-CBC')
    {
        $data = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        $data = base64_encode($data);
        return $data;
    }

    /**
     * @AES 对称解密
     * @param $data
     * @param $key
     * @param $iv
     * @param string $method
     * @return bool|string
     */
    public static function aesDecryptByKey($data, $key, $iv,$method = 'AES-256-CBC')
    {
        $data = base64_decode($data);
        $data = openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        return $data;
    }

    /**
     * @AES 对称加密泰隆示例
     * @param $data
     * @param $key
     * @param $iv
     * @return string
     */
    public static function aesEncryptByKeyT($data,$key,$iv)
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

}