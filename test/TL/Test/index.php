<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 9:24
 */
include __DIR__ . "/vendor/http.php";

class index
{
    const APPID = "7db7f404-1a20-7777-bf8b-2bb8060f67ad";

    const APPSECRETKEY = "8f85134c-3ea4-6a27-e053-010000705858";

    const TLPUBLICKEY = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQSFJN8fA4mxTeAnGGv6
cAmfBJFukQwFsx6TyW/G0agMKZjWEpbt8ei9hPl4tQC3T6XJPVW08QYidYIs0JmP
ftjVoU7hmmzdagXLybAig9C5rNeXXJMKaVYK+iiPc7Aipl0KBeNyVzqQaa4eXXD0
TCyfDG7AClt853+YNiS0R7cp5RK+9ifWO3+CZbYDN7ufSvZQlz5c0CWxVA6TFSH3
7GERbQAxQzf0Tgk8EjEvjMh2W6cIyQ34McytGwJGGlQf2Y1On7ExaZqJ4N3Burbj
vmHPCWh4EMy2pb8hyb8sL/xkt8Hwtagcc7NDGSRjNEQikQqBtno0c7PSwITIaE9q
fwIDAQAB
-----END PUBLIC KEY-----";

    const JKPRIVATEKEY = "-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAlzYDeuZPfgicrp55tMAbqn4pmZqekICCfr9k+g3S2iZVn9wq
98ipgFTZE03um+KlNp3Si0c/ReP0qxy+mCSFrV6wfZW2kXB5QRYVesl6Wd44Hut0
AlcJrX9FpXOqf+zcVaUBP51q4Vhgi+NwjSy55UKU0+9Xk+dfB2hI1anDO7paESJo
eqS03gM90P840naipOt16BD+PFoD6osHEp23DiNCt96C0JV1VH21KNHtcP7aLwt5
UntBZ8et5ytybZCZiw0pOSthFld9HvYtr2MlimiuDXj54rfpGr842pTm0H9EBWwG
mLNy1u6O/x7YGmguO9JE5TZfan+kLUmJ/jSk5QIDAQABAoIBAARI2oZj+kKm+dGU
2fv+KYqGMqWQlQehLJFs2O6g76WQyoJSGcGVpP/m55O9dJJkNKw8gpfBuBBB6k/i
65+iAUutUDDuyhKK7lSizI8DIH1lZ4+wukPKtZJ99bo/cchYLNIcb9Geo0WpXGr6
UdkeOFI/tbnfoUqmlrG+CbpMKiUKEpajEJxUCJd9mAE6hGUIcZvIN0RxqKWjStdU
tbbD+vqSdpgDw5XZhz4D3CeH/c+v55H3+HRrdek2gNPIHI95JmLc6jMjupf7otSH
tPhCjwUY5ctVf+kjAsu80/dM8M6/rkf812cT75JVgRX6OYLjAnU1SrZ9N/K6t/kE
Ickq+kECgYEAx0r7JP+bL4+Hlty3q+prNOBdj0C434o6BxX8fAgkYMgaLimS4szH
mvygq0TwJoE4z4KOtj0z5iLsgn3FIFh2X1LEGVvi17xYExhuRcnQvBbvss+2TWSy
+YgQk5J3lc8tFQtVIFRyXThmhPyNmw2HKCGPcQgt2yT69VHFExzI3FECgYEAwjye
wFMbl0smHNii3RAu6EqTRUUzTLL14BH3CEmEQ0+f32pD9dCkwkf+7ZNafg4A3v2c
Rdr6HHOIT+eMC9UtRWJtldqJOmY8PBinZ/hirMXI0L/bUQFoVwAN8gzZVo/veVPR
Ol7QXa5f3Wp38X1MXeMnIRfoVfV4LdwxOegSHlUCgYA4W37b/qB++aLJSc9zAU6h
3FT43r+pD2jLei81UAQhjlTA+ya7lldX/9rbtBoJeX98RxpedL5JdVTWrgRh2kJX
QIuN9EsY4P0zITSF7cVme0H7mfuetTxbjlvJr6C7r6O7EMJY6yiQLhPnxZex4kh3
U85Bk6OMFlAVsbL+baRrkQKBgQCxfQ9bkxXNREBJb7Qy6QzT+wFj9P4Rgh6naAMi
MXuIvoPKdaIwRz2mwn8yvMmeElG9cmWQd67AvNm8mksgrOW3V1/n5VAsaytzhtvC
Z/hTBFCiYA6akPy1MzmLCy62qMQdS/gOrIEeea7j9twvcV2NFXq2BNCra6krzt+0
mFmmGQKBgHsYGn1Lg6Eewd+Tr2abHF1emIhriEKN6E7RZbmUXZAfNb+k+NvFgJyB
i/g0OJx2gNCfJhYryzryIfvKP9i/0e9JgwqpryViRKAUkHdIPQKIu8zJjszwpoXV
3M3/KyXH0JUPAvVsDHheJI4KwyRXVMjDtcXoQlHdvMvPxnlunQAS
-----END RSA PRIVATE KEY-----";

    const TOKENURL = "https://ydpttest.cn/apiSIT/shjk/approveDev/";
    const WXPAYURL = "https://ydpttest.cn/apiSIT/shjk/wechatOrder/";

    private $token = '';

    private $iv = 'abcdefghABCDEFGH';

    public function start()
    {
        $toekn = $this->getToken();
//        $this->wxPay();
        return false;
    }

    //获取token
    public function getToken()
    {
        //获取6位数字符串
        $seqNO = (string)rand(100000,999999);
        //获取16位随机字符串并md5 转大写 得到
        $key = strtoupper(md5($this->getKey()));
        //拼接参数数组
        $data = [
            'appID' => self::APPID,
            'seqNO' => $seqNO,
            'random'=> strtoupper(md5($seqNO)),
            'rsaEncryptData' => $this->encryptByPrivateKey($key), //rsa加密key
        ];
        //拼接签名参数，md5转大写
        $data['sign'] = strtoupper(md5($data['random'] . $data['seqNO'] . self::APPSECRETKEY . $key));
        //发送post接口请求
        $res = http::post(self::TOKENURL,$data);
        $res = json_decode($res,true);
        var_dump($res);
//        $res = $this->https_post("https://ydpttest.cn/apiSIT/lyk/approveDev",$data);
        //解密返回token数据
        $token = $this->decryptByPublicKey($res['rsaEncryptData']);
        //拼接签名参数
        $sign = strtoupper(md5($data['random'] . $data['seqNO'] . $token . self::APPSECRETKEY));
        //对比签名是否正确
        if( $sign != $res['sign']){
            return false;
        }
        $this->token = $token;
        //返回token
        return $token;
    }

    /**
     * 支付宝支付
     */
    public function aliPay()
    {
//创建模拟请求数据，必须包含head，body
        $introId = $this->introId();
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                "acctType" => "03zzzzzzzzZZZZZZZ",
                'mechNo'=>"8201907040006301",
                'inetNo'=>$introId,
                'sndTm' => date("YmdHis"),
                'sendDate' => date("Ymd"),
                'channelCode' => 'CNJK020401',
                'clntSbtpId' => 'ojo615ItD1RzFrFdJDC',
                'wechatPublicNo' => 'wx45b627473bc41c3b',
                'prdctMsg' => "Pay Test",
                'payAmount' => "10",
                "ccy" => "156"
            ],
            /**
             * /sdoroot/body/mechno=8201907040006301
            /sdoroot/body/inetno=OD1157091005103992834
            /sdoroot/body/ccy=156
            /sdoroot/body/sndtm=20190802084928
            /sdoroot/body/clntsbtpid=-OnJ5Tc1U
            /sdoroot/body/wechatpublicno=wx45b627473bc41c3b
            /sdoroot/body/accttype=02
            /sdoroot/body/payamount=1
             */
        ];
        var_dump($data);
        $res = $this->cityQuery($data,self::WXPAYURL);
    }

    /**
     * 微信支付
     */
    public function wxPay()
    {
        //创建模拟请求数据，必须包含head，body
        $introId = $this->introId();
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
//            'body' => [
//                "acctType" => "02",
//                'mechNo'=>"8201907040006301",
//                'inetNo'=>$this->orderId("inetNo"),
//                'sndTm' => date("YmdHis"),
//                'clntSbtpId' => 'ojo615ItD1',
//                'prdctMsg' => "Pay Test",
//                'payAmount' => "10",
//                "ccy" => "156"
//            ],
            /**
             * /sdoroot/body/mechno=8201907040006301
            /sdoroot/body/inetno=OD1157091005103992834
            /sdoroot/body/ccy=156
            /sdoroot/body/sndtm=20190802084928
            /sdoroot/body/clntsbtpid=-OnJ5Tc1U
            /sdoroot/body/wechatpublicno=wx45b627473bc41c3b
            /sdoroot/body/accttype=02
            /sdoroot/body/payamount=1
             */
            'body' => [
                'mechNo'=>"8201907040006301",
                'inetNo'=>$introId,
                'ccy'=>"156",
                'sndtm'=>'20190802084928',
                'clntSbtpId'=>'ojo615ItD1RzFrFdJDC',
                'wechatPublicNo'=>'wx45b627473bc41c3b',
                'acctType'=>'02',
                'payAmount'=>'1'
            ]
        ];
        var_dump($data);
        $res = $this->cityQuery($data,self::WXPAYURL);
    }

    //业务请求封装
    public function cityQuery($array=[],$url)
    {
        //数据转json
        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
        //获取随机6位字符串数字
        $seqNO = (string)rand(100000,999999);
        //获取随机字符串秘钥，md5 并转大写
        $key = strtoupper(md5($this->getKey()));
        //拼接请求数据
        $data = [
            'appID' => self::APPID,
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $this->getToken(),//获取token
            'rsaEncryptData' => $this->encryptByPrivateKey($key) //对秘钥使用rsa加密
        ];
        //拼接签名字段
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] . self::APPSECRETKEY . $key));
        //AES加密业务数据
        $data['reqData'] = $this->encrypt($json,strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . self::APPSECRETKEY . $key)));
        var_dump("业务数据json");
        var_dump($json);
        var_dump("请求数据");
        var_dump($data);
        $res = http::curl($url,$data);
        var_dump($res);
        return $res;
    }

    //AES加密
    private function encrypt($encryptStr,$encryptKey)
    {
        $localIV = $this->iv;

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
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $key .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $key .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $key;
    }

    /**
     * 私钥加密
     * @param 原始数据 $data
     * @return 密文结果 string
     */
    private function encryptByPrivateKey($data) {
        openssl_private_encrypt($data,$encrypted,self::JKPRIVATEKEY,OPENSSL_PKCS1_PADDING);//私钥加密
        $encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
        return $encrypted;
    }

    /**
     * 公钥解密
     * @param 密文数据 $data
     * @return 原文结果 string
     */
    private function decryptByPublicKey($data) {
        $data = base64_decode($data);
        openssl_public_decrypt($data,$decrypted,self::TLPUBLICKEY,OPENSSL_PKCS1_PADDING);//公钥解密
        return $decrypted;
    }

    private function orderId($string = '')
    {
        return md5(uniqid() . rand(100000,999999) . $string);
    }

    private function introId()
    {
        return 'JK' . uniqid() . rand(100000,999999);
    }
}

$index = new index();
$index->start();