<?php

class CryptAES
{
    /**
     * var string $method 加解密方法，可通过openssl_get_cipher_methods()获得
     */
    protected $method;

    /**
     * var string $secret_key 加解密的密钥
     */
    protected $secret_key;

    /**
     * var string $iv 加解密的向量，有些方法需要设置比如CBC
     */
    protected $iv;

    /**
     * var string $options （不知道怎么解释，目前设置为0没什么问题）
     */
    protected $options;

    /**
     * 构造函数
     *
     * @param string $key 密钥
     * @param string $method 加密方式
     * @param string $iv iv向量
     * @param mixed $options 还不是很清楚
     *
     */
    public function __construct($key, $method = 'AES-128-ECB', $iv = '', $options = OPENSSL_RAW_DATA)
    {
        // key是必须要设置的
        $this->secret_key = isset($key) ? $key : exit('key为必须项');

        $this->method = $method;

        $this->iv = $iv;

        $this->options = $options;
    }

    /**
     * 加密方法，对数据进行加密，返回加密后的数据
     * @param string $data 要加密的数据
     * @return string
     */
    public function encrypt($data)
    {
        return bin2hex(openssl_encrypt($data, 'AES-128-ECB', "yiz96cHEG7sRZYmD", 1));
    }

    public function decrypt($data)
    {
//        $data = base64_decode($data);
        $data = pack("H*",$data);
        return openssl_decrypt($data, 'AES-128-ECB', "yiz96cHEG7sRZYmD", 1,'');
    }
}

$Crypt = new CryptAES("1111111122222222","AES-128-ECB");


$str = 'sh=8201908280041143&dh=ckdydT00001&je=0.01&code=134704280346946267';
echo "未加密字符串：" . $str . PHP_EOL;

echo "加密结果：" . $Crypt->encrypt($str) . PHP_EOL;

echo "解密结果：" . $Crypt->decrypt("E1D507D110788378ED361AF99C7D89946D02CD2D868B7B205A9658AAC21C8E42A5F90BB88CDD5DC78DDF41676C304C2E") . PHP_EOL;

echo "请求URL: " . "https://sk.jkmjk.com/g/z/?p=" . $Crypt->encrypt($str) . PHP_EOL;