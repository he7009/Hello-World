<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 9:24
 */

include __DIR__ . "/vendor/http.php";

class Base
{
    public $config = array();
    public $token = '';

    public function __construct()
    {
        $this->config = include __DIR__ . "/config/config.php";
    }

    /**
     * @获取请求令牌
     * @return string
     */
    public function getToken()
    {
        return '3bbb2b757a6045e40f064d5d8b37da11';

        $seqNO = (string)rand(100000,999999);
        $key = strtoupper(md5($this->getKey()));
        $data = [
            'appID' => $this->config['appId'],
            'seqNO' => $seqNO,
            'random'=> strtoupper(md5($seqNO)),
            'rsaEncryptData' => $this->encryptByPrivateKey($key), //rsa加密key
        ];
        $data['sign'] = strtoupper(md5($data['random'] . $data['seqNO'] . $this->config['appsecretkey'] . $key));
        //发送post接口请求
        $res = http::post($this->config['tokenUrl'],$data);
        $res = json_decode($res,true);
        $token = $this->decryptByPublicKey($res['rsaEncryptData']);
        $sign = strtoupper(md5($data['random'] . $data['seqNO'] . $token . $this->config['appsecretkey']));
        if( $sign != $res['sign']){
            echo "token 获取失败" . PHP_EOL;
            exit;
        }
        $this->token = $token;
        echo "token---" . $token . PHP_EOL;
        return $token;
    }

    /**
     * @发送请求
     * @param $array
     * @param $url
     * @return mixed|null
     */
    public function cityQuery($array = [],$url)
    {
        //数据转json
        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
        //获取随机6位字符串数字
        $seqNO = (string)rand(100000,999999);
        //获取随机字符串秘钥，md5 并转大写
        $key = strtoupper(md5($this->getKey()));
        //拼接请求数据
        $data = [
            'appID' => $this->config['appId'],
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $this->getToken(),//获取token
            'rsaEncryptData' => $this->encryptByPrivateKey($key) //对秘钥使用rsa加密
        ];
        //拼接签名字段
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] . $this->config['appsecretkey'] . $key));
        //AES加密业务数据
        $data['reqData'] = $this->encrypt($json,strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $this->config['appsecretkey'] . $key)));
        echo "-------Request Data-------" . PHP_EOL;
        var_dump($data);
        $res = http::curl($url,$data);
        return $res;
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

    /**
     * 获得随机字符串
     **/
    private function getKey($length = 16)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            // $key .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $key .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $key;
    }

    /**
     * 私钥加密
     * @param $data
     * @return string
     */
    public function encryptByPrivateKey($data) {
        openssl_private_encrypt($data,$encrypted,$this->config['jkPrivateKey'],OPENSSL_PKCS1_PADDING);
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * 公钥解密
     * @param $data
     * @return string
     */
    public function decryptByPublicKey($data) {
        $data = base64_decode($data);
        openssl_public_decrypt($data,$decrypted,$this->config['TLPublicKey'],OPENSSL_PKCS1_PADDING);
        return $decrypted;
    }

    /**
     * @获取32位随机字符串
     * @param string $string
     * @return string
     */
    public function orderId($string = '')
    {
        return md5(uniqid() . rand(100000,999999) . $string);
    }

    /**
     * @获取32位以内随机字符串
     * @return string
     */
    public function introId()
    {
        return 'JK' . date('YmdHis') . rand(100000,999999);
    }
}