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

    public static function aesEncryptByToken()
    {

    }

    /**
     * @ASE加密
     * @param $encryptStr
     * @param $encryptKey
     * @return string
     */
    private function encrypt($encryptStr,$encryptKey)
    {
        $localIV = $this->config['iv'];

        //Open module
        $module = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $localIV);

        //print "module = $module <br/>" ;
        @mcrypt_generic_init($module, $encryptKey, $localIV);

        //Padding
        $block = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $pad = $block - (strlen($encryptStr) % $block); //Compute how many characters need to pad
        $encryptStr .= str_repeat(chr($pad), $pad); // After pad, the str length must be equal to block or its integer multiples
        //encrypt
        $encrypted = @mcrypt_generic($module, $encryptStr);

        //Close
        @mcrypt_generic_deinit($module);
        @mcrypt_module_close($module);

        return base64_encode($encrypted);
    }

}