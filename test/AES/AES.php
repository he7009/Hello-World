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
     *
     * @param string $data 要加密的数据
     *
     * @return string
     *
     */
    public function encrypt($data)
    {
//        var_dump(openssl_get_cipher_methods());
//        exit;
//        $block = 16;
//        $pad = $block - (strlen($data) % $block); //Compute how many characters need to pad
//        $data .= str_repeat(chr($pad), $pad);
        return strtoupper(bin2hex(openssl_encrypt($data, 'aes-256-ecb', "fLMbFYkTC8vTlwKaGyrb0KmvyWC57IvO", 1)));
    }

    public function decrypt($data){
        $data = pack("H*",strtolower($data));
        return openssl_decrypt($data, 'aes-256-ecb', "fLMbFYkTC8vTlwKaGyrb0KmvyWC57IvO", 1);
    }
}

$Crypt = new CryptAES("1111111122222222","AES-128-ECB");

echo "加密结果：" . $Crypt->encrypt("sh=8201908280041143&dh=B3A49E95D046440D2D67E9F38&je=3560.00") . PHP_EOL;

echo "解密结果：" . $Crypt->decrypt("6BC3970CD3D50F6A6651929F8A0E2271C3D50318343D5C27B8B7D92A166A5CAE33288D7A8DC8EEB921CE027A229E7BA6573D6502E601424248F41521532CD2B866CD30F3AE55B8ECBA3DA6C0C401CA19") . PHP_EOL;
