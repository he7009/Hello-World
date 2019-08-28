<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/8/19
 * Time: 16:18
 */

class AES
{
    private $data = '{"signMethod":"MD5","rspData":"W5MXBGmCwe8fs28FO0P8DnSreEaysdM9z+5xOxlHZlPexWptv0dfda6QBx5geqGkhV/CilNIRlKmYwRAbRQI/mN2XE32CLh1HJFQjPKU2B65+AkAjDOFlwJxBwX81dlG667nFAQSKqsZ/3RMnqMLNL19BJ38mlM0Nyn5iZ1Emz7yNH2fht8IB+g4WA1XNx4Ykf0L9AWTaO4D7ULHh8Pf6ffADauphmgHTGuy6cNGhnJTE/fYHYqiuMieqgxXiT6vxCnywMXs/zxz66YZoA9+q4pu9VhAkw72HBdQfznz7bVdY5atp6ZMqIxxjr9SunxozUmKrv2m9RBsHnIj5tNkccosRFinzaGycEI7AxdQ4y0ZJheHoh3Pzy2fkkByvWDuckGpy84Uu2ZUaEhs59JWVxG/THVk0x1c6yfH8f9YposN0xs82f1jU+urD3S+AZNOjRkLmFUNihUfb2ttbY8mXRYpPttgOJw+hhecvR6PUz4=","encryptMethod":"AES","errorCode":"000000","errorMsg":"交易成功","seqNO":"934208","appID":"7db7f404-1a20-7777-bf8b-2bb8060f67ad","rsaEncryptData":"B5N9geafVXE+wIdwv4voUbbkhIhi34PIfuoBt6ObVbqxR+oVo69vqAXZFVXl4Vaz+fG6jPyJD5xtd6qzeEMASw5AB4Y3S3O+vqlTY6yvANY6FFHyBQKPpoQr19tTXo7XvmZRjmI34KxQ6hMbxnA4fHrTcTnxu3Idq1/slp4RNu3GOSzTST+3ikePygOAzTYTHBSNnCM74znC5AlUnpPZ29SICjdQOK5bGAq758zmkCdDjuv8cfyamJoWNpdvFHAclwZEN3w4JXcVrk9jG/EujZmdpZp+AuyXGZbW8y/vlE0U9H47XGhWs/p9M29fmXlT4NRE6CJWaZ/85lbcdTRdVQ==","sign":"DAFF2476F3BC782D42238C498B473AB1"}';

    public function run()
    {
        $dataArr = json_decode($this->data,true);
        $token = $this->rsa($dataArr['rsaEncryptData']);
        $asskey = strtoupper(md5($dataArr['seqNO'] . '34f562be78030eb74e35f8f8ad210d5a' . '8f85134c-3ea4-6a27-e053-010000705858' . $token));
        $json = $this->aesDecryptByKey($dataArr['rspData'],$asskey);

        $sign = strtoupper(md5($json . $dataArr['seqNO'] . '8f85134c-3ea4-6a27-e053-010000705858' . $token));
        var_dump($token);
        $reqdata = json_decode($json,true);
        var_dump($reqdata);

        echo $sign . PHP_EOL;
        echo $dataArr['sign'] . PHP_EOL;
//        var_dump($dataArr);
    }

    public function rsa($data)
    {
        $data = base64_decode($data);
        openssl_public_decrypt($data,$decrypted,"-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQSFJN8fA4mxTeAnGGv6
cAmfBJFukQwFsx6TyW/G0agMKZjWEpbt8ei9hPl4tQC3T6XJPVW08QYidYIs0JmP
ftjVoU7hmmzdagXLybAig9C5rNeXXJMKaVYK+iiPc7Aipl0KBeNyVzqQaa4eXXD0
TCyfDG7AClt853+YNiS0R7cp5RK+9ifWO3+CZbYDN7ufSvZQlz5c0CWxVA6TFSH3
7GERbQAxQzf0Tgk8EjEvjMh2W6cIyQ34McytGwJGGlQf2Y1On7ExaZqJ4N3Burbj
vmHPCWh4EMy2pb8hyb8sL/xkt8Hwtagcc7NDGSRjNEQikQqBtno0c7PSwITIaE9q
fwIDAQAB
-----END PUBLIC KEY-----",OPENSSL_PKCS1_PADDING);
        return $decrypted;
    }

    /**
     * @AES 对称解密
     * @param $data
     * @param $key
     * @param $iv
     * @param string $method
     * @return bool|string
     */
    public static function aesDecryptByKey($data, $key, $iv = 'abcdefghABCDEFGH',$method = 'AES-256-CBC')
    {
        $data = base64_decode($data);
        $data = openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        return $data;
    }
}

$aes = new AES();
$aes->run();