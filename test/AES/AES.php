<?php
/**
 * Created by PhpStorm.
 * User: ������
 * Date: 2019/8/19
 * Time: 16:18
 */

class AES
{

    /**
     *  �㷨/ģʽ/���                16�ֽڼ��ܺ����ݳ���        ����16�ֽڼ��ܺ󳤶�
        AES/CBC/NoPadding              16                          ��֧��
        AES/CBC/PKCS5Padding           32                          16
        AES/CBC/ISO10126Padding        32                          16
        AES/CFB/NoPadding              16                          ԭʼ���ݳ���
        AES/CFB/PKCS5Padding           32                          16
        AES/CFB/ISO10126Padding        32                          16
        AES/ECB/NoPadding              16                          ��֧��
        AES/ECB/PKCS5Padding           32                          16
        AES/ECB/ISO10126Padding        32                          16
        AES/OFB/NoPadding              16                          ԭʼ���ݳ���
        AES/OFB/PKCS5Padding           32                          16
        AES/OFB/ISO10126Padding        32                          16
        AES/PCBC/NoPadding             16                          ��֧��
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

        //����
        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $data, MCRYPT_MODE_CBC, $iv);
        $encryptData = base64_encode($encrypted);
        echo $data . "����base64Ϊ��" . $encryptData . PHP_EOL;

        //����
        $encryptedData = base64_decode($encryptData);
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
        echo $encryptData . "base64 ����Ϊ��" . $decrypted . PHP_EOL;
    }
}

$aes = new AES();
$aes->run();