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
        $key = "1234567812345678";
        echo "key :" . $key . PHP_EOL;
        $data = self::encrypt("duanyude&helilan",$key);
        self::opensslEncrypt("duanyude&helilan",$key);
        $data = self::encryptTl("duanyude&helilan",$key);
        self::opensslDecrypt($data,$key);
//        self::decrypt($data,$key);
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

    public static function encrypt($input, $key) {
        $key=md5($key.md5($key));
        $size = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = self::pkcs5_pad($input, $size);
        $td = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = @mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        @mcrypt_generic_init($td, $key, $iv);
        $data = @mcrypt_generic($td, $input);
        @mcrypt_generic_deinit($td);
        @mcrypt_module_close($td);
        $data = base64_encode($data);
        echo "{$input} ECB128位加密：" . $data . PHP_EOL;
        return $data;
    }

    private static function pkcs5_pad ($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    public static function decrypt($dStr, $dKey) {
        $dKey=md5($dKey.md5($dKey));
        $decrypted= mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$dKey,base64_decode($dStr),MCRYPT_MODE_ECB);
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s-1]);
        $decrypted = substr($decrypted, 0, -$padding);
        echo "{$dStr} ECB128位解密：" . $decrypted . PHP_EOL;
        return $decrypted;
    }

    /**
     * [opensslDecrypt description]
     * 使用openssl库进行加密
     * @param  [type] $sStr
     * @param  [type] $sKey
     * @return [type]
     */
    public static function opensslEncrypt($input, $sKey, $method = 'AES-128-CBC'){
//        $sKey=md5($sKey.md5($sKey));
//        $data = openssl_encrypt($input,$method,$sKey);
        $data = openssl_encrypt($input, $method,$sKey,OPENSSL_RAW_DATA  ,'abcdefghABCDEFGH');
        $data = base64_encode($data);
        echo "{$input} ECB128位加密：" . $data . PHP_EOL;
        return $data;
    }

    /**
     * [opensslDecrypt description]
     * 使用openssl库进行解密
     * @param  [type] $sStr
     * @param  [type] $sKey
     * @return [type]
     */
    public static function opensslDecrypt($sStr, $sKey, $method = 'AES-128-CBC'){
//        $sKey=md5($sKey.md5($sKey));
//        $str = openssl_decrypt($sStr,$method,$sKey);
        $sStr = base64_decode($sStr);
        $str = openssl_decrypt($sStr, $method,$sKey,OPENSSL_RAW_DATA  ,'abcdefghABCDEFGH');
        echo '正确解密为：' . $str . PHP_EOL;
    }

    public static function encryptTl($encryptStr,$encryptKey,$iv = 'abcdefghABCDEFGH')
    {
//        $encryptKey=md5($encryptKey.md5($encryptKey));
        $localIV = $iv;

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
        echo "{$encryptStr} ECB128位加密：" . base64_encode($encrypted) . PHP_EOL;
        return base64_encode($encrypted);
    }
}

$aes = new AES();
$aes->run();