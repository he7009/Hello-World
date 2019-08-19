<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/8/19
 * Time: 16:18
 */

class AES
{

    /**
     *  算法/模式/填充                16字节加密后数据长度        不满16字节加密后长度
        AES/CBC/NoPadding              16                          不支持
        AES/CBC/PKCS5Padding           32                          16
        AES/CBC/ISO10126Padding        32                          16
        AES/CFB/NoPadding              16                          原始数据长度
        AES/CFB/PKCS5Padding           32                          16
        AES/CFB/ISO10126Padding        32                          16
        AES/ECB/NoPadding              16                          不支持
        AES/ECB/PKCS5Padding           32                          16
        AES/ECB/ISO10126Padding        32                          16
        AES/OFB/NoPadding              16                          原始数据长度
        AES/OFB/PKCS5Padding           32                          16
        AES/OFB/ISO10126Padding        32                          16
        AES/PCBC/NoPadding             16                          不支持
        AES/PCBC/PKCS5Padding          32                          16
        AES/PCBC/ISO10126Padding       32                          16
     */
    public function run()
    {
        $this->aesCBC();
    }

    /**
     * AES CBC
     */
    public function aesCBC()
    {
        $privateKey = "1234567812345678";
        $iv = "1234567812345678";
        $data = "Test String";

        //加密
        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $data, MCRYPT_MODE_CBC, $iv);
        $encryptData = base64_encode($encrypted);
        echo $data . "加密base64为：" . $encryptData . PHP_EOL;

        //解密
        $encryptedData = base64_decode($encryptData);
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
        echo $encryptData . "base64 解密为：" . $decrypted . PHP_EOL;
    }
}

$aes = new AES();
$aes->run();