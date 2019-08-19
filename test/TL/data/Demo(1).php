<?php
/**
 * @Author: Marte
 * @Date:   2017-07-31 15:26:02
 * @Last Modified by:   Marte
 * 1、getPostData 获取对方发过来的请求使用此方法对获取到的数据进行解密解签后得到数据
 * 2、runJson 返回数据给对方使用此方法对数据进行拼接加签加密后返回
 * 3、getToken 获取token方法，可以自行储存在文件内重复使用，过期后再次获取
 * 4、postJry 业务请求数据拼接，发送请求接口
 * 5、cityQuery 业务请求封装
 * 6、decryptByPublicKey  rsa解密方法
 * 7、encryptByPrivateKey  rsa加密方法
 * 8、decrypt   aes解密方法
 * 9、encrypt   aes加密方法
 */

namespace app\api\controller;


use think\Controller;

class Demo extends Controller
{

    //公钥
    protected $publicKey = "-----BEGIN PUBLIC KEY-----

-----END PUBLIC KEY-----";
    //秘钥

    protected $privateKey = "-----BEGIN PRIVATE KEY-----

-----END PRIVATE KEY-----";
    //AES偏移量
    protected $iv = 'abcdefghABCDEFGH';
    protected $appSecretKey = "8e5486c5-e1bb-4679-e053-010000738145";
    protected $appID = "c3a0f87f-510a-43df-b688-5a9b47e95abf";
    protected $token = "";

    public function test(){
        test();
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
            'appID' => $this->appID,
            'seqNO' => $seqNO,
            'random'=> strtoupper(md5($seqNO)),
            'rsaEncryptData' => $this->encryptByPrivateKey($key), //rsa加密key
        ];
        //拼接签名参数，md5转大写
        $data['sign'] = strtoupper(md5($data['random'] . $data['seqNO'] . $this->appSecretKey . $key));
        //发送post接口请求
        $res = $this->https_post("https://ydpttest.cn/apiSIT/lyk/approveDev",$data);
        //解密返回token数据
        $token = $this->decryptByPublicKey($res['rsaEncryptData']);
        //拼接签名参数
        $sign = strtoupper(md5($data['random'] . $data['seqNO'] . $token . $this->appSecretKey));
        //对比签名是否正确
        if( $sign != $res['sign']){
            return false;
        }
        $this->token = $token;
        //返回token
        return $token;
    }

    //业务请求数据
    public function postJry()
    {
        //创建模拟请求数据，必须包含head，body
        $data = [
            'head' => [
                'id' => 8989
            ],
            'body' => [
                'code'=>"000000",
                'msg'=>"测试请求"
            ]
        ];
        $res = $this->cityQuery($data);
        dump("返回结果");
        halt($res);

    }

    //业务请求封装
    public function cityQuery($array=[])
    {
        //数据转json
        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
        //获取随机6位字符串数字
        $seqNO = (string)rand(100000,999999);
        //获取随机字符串秘钥，md5 并转大写
        $key = strtoupper(md5($this->getKey()));
        //拼接请求数据
        $data = [
            'appID' => $this->appID,
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $this->getToken(),//获取token
            'rsaEncryptData' => $this->encryptByPrivateKey($key) //对秘钥使用rsa加密
        ];
        //拼接签名字段
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] . $this->appSecretKey . $key));
        //AES加密业务数据
        $data['reqData'] = $this->encrypt($json,strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $this->appSecretKey . $key)));
        dump("业务数据json");
        dump($json);
        dump("请求数据");
        dump($data);
        $res = $this->https_post("https://ydpttest.cn/apiSIT/lyk/scanPaymentCode",$data);
        return $res;
    }
    //获取post数据并解密解签获得业务数据
    public function getPostData()
    {
        //获取post数据
        $arr = input("post.");
        //模拟post获取数据
        $arr = '{"sign":"1CA0926A5C8BC2E2347E57016650E731","signMethod":"MD5","rsaEncryptData":"xs8lNVCj4ZCsAbXoJHI+AmRPqDJk01dlt3q7Jb9Vox4SNvvx6F+DclM2v1FdnDxAsNgXBERLXCc3SOFnqtrcMdYxc2GKyF+YTLJKjX0NmlGkXlO2oipIzhIL94la\/NGEzlT+JL4I8KF5vZvE+4gudkg0mZ+jC6jPWc+qyM6RROdwbgYPCiOpVTaQ+jtIxwz4rCY\/a2z\/fAFazzApUbyRxsCTVRESJ+3dU8V9zYxE7VzrV+IlOCwJdAIAfGPcwjq5wd3p\/3yEeFDBbZz0N6jnIEIlkCH99NsNFWIYY2mH0K2z+ccpJlBejoNq+FaxusS2DvZfJhp8xa3dav8itVyiSw==","encryptMethod":"AES","reqData":"QbYx9PwqKwy30K1SSgiorq9Sg9taSxImEw6qwY93N0QhsRb1UHqBghS+WmbBRZxrBTCMYNGBsG1GFvUdJxIrdXaQ4qBU\/PTpIjLlD+bvRyE27OYgHrSpQ6umylxWXSTYUIO0qbdTjNTR8UwRKPlHjuUJ149E5eH+s\/oyE6zZi9KNzx8BwjeZ\/Qeo\/CQF7fMuu3uJF7XOOIDqLidXvevQEr8hHLUyT40a\/NZsOAoqQSoNppazy+tDuttATH7gFWjFKNzRtt89wDdbjWNtK95tc\/uUBojfjg5HKcctSmqQ7jW6HvA2J5k3WnC6mxsTdaU9WPjtKbnqGUTkoM9YbJs1VghcnnQLSH49wAY7kB5SwWwTaPkHZy5kvytfMvLjwgjUioW0qYSpZyaBww4dSXJ0bQ1Mb+TArunrCpIzl2T4ZkzWT3\/j0m4bJoq7le4l03NVAn8iA3ju2asrBbrySTWzQ9vXDQbq1q+S5uh9YTXrVq0dM6CMNV8KquOCEC0UyaTKxCK2+cAS9LDQD4APXRTuNhkR57LKox2CfvN+CTDlWw8QfFfYKdNpmt\/OHklrUez0LcfMluc08ce1fvoDCuOqMN51y5qhV+d3utWa5rBjvzhE8de5qi54l3qW4EV03sQRdvN7R433fxOVt33N1mZ3NOwx1xjnJ4ivdVuhZ1XbGHd\/B7NGGafQbx3RChEIT250Kl3vih\/P2yF1ozQC8MY6sAHgOxAufmos8DoOwwWy9L59lNqN2sAnVpPalvjM4UCa8pkSrToDaoU4Sc44JOBghQ==","appAccessToken":"","seqNO":"127600","appID":"a539d3d7-3d4b-454b-9c49-7fb83fb8b611"}';//正式获取数据删除这里
        $arr = json_decode($arr, true); //正式获取数据删除这里

        //检验字段是否缺失
        if (!isset($arr['rsaEncryptData']) || !isset($arr['seqNO']) || !isset($arr['signMethod']) || !isset($arr['sign']) || !isset($arr['encryptMethod']) || !isset($arr['reqData']) || !isset($arr['appID'])) {
            return $this->runJson("1000001", "缺少参数");
        }
        dump("获取到的post数据");
        dump($arr);
        //rsa解密秘钥字段rsaEncryptData
        $rasKey = $this->decryptByPublicKey($arr['rsaEncryptData']);
        dump("解密后的秘钥");
        dump($rasKey);
        //拼接秘钥
        $key = $arr['seqNO'] . $this->token . $this->appSecretKey . $rasKey;

        //秘钥转md5 转大写
        $key = strtoupper(md5($key));

        //aes解密
        $res = $this->decrypt($arr['reqData'], $key);

        $res = json_decode($res, true);
        dump("数据结果");
        halt($res);
    }

    /**
     * 公钥解密
     * @param 密文数据 $data
     * @return 原文结果 string
     */
    private function decryptByPublicKey($data) {
        $data = base64_decode($data);
        openssl_public_decrypt($data,$decrypted,$this->publicKey,OPENSSL_PKCS1_PADDING);//公钥解密
        return $decrypted;
    }
    /**
     * 私钥加密
     * @param 原始数据 $data
     * @return 密文结果 string
     */
    private function encryptByPrivateKey($data) {
        openssl_private_encrypt($data,$encrypted,$this->privateKey,OPENSSL_PKCS1_PADDING);//私钥加密
        $encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
        return $encrypted;
    }

    //封装返回数据
    private function runJson($code="000000",$msg="完成"){
        return json(['code'=>$code,'message'=>$msg]);

        //以下加密信息返回，暂时不用使用
//        $data = [
//            'signMethod'    => 'MD5',
//            'encryptMethod' => 'AES',
//            'appID' => $this->appID,
//            'seqNO' => (string)rand(100000,999999),
//            'appAccessToken' => ''
//        ];
//        $json = json_encode(['code'=>$code, 'message'=>$msg]);
//        $key = strtoupper(md5(getKey()));//随机秘钥
//        $data['rsaEncryptData'] = $this->encryptByPrivateKey($key);
//        $data['reqData'] = $this->encrypt($json, $key);
//        $data['sign'] = strtoupper(md5($data['reqData'] . $data['seqNO'] . $this->appSecretKey . $key ));
//        return json($data);
    }

    //AES解密
    private function decrypt($encryptStr, $encryptKey)
    {
        $localIV = $this->iv;

        //Open module
        $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $localIV);

        //print "module = $module <br/>" ;

        mcrypt_generic_init($module, $encryptKey, $localIV);

        $encryptedData = base64_decode($encryptStr);
        $encryptedData = mdecrypt_generic($module, $encryptedData);
        $encryptedData = preg_replace('/[\x00-\x1f]/', '', $encryptedData);
        return $encryptedData;
    }

    //AES加密
    private function encrypt($encryptStr,$encryptKey)
    {
        $localIV = $this->iv;

        //Open module
        $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $localIV);

        //print "module = $module <br/>" ;

        mcrypt_generic_init($module, $encryptKey, $localIV);

        //Padding
        $block = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $pad = $block - (strlen($encryptStr) % $block); //Compute how many characters need to pad
        $encryptStr .= str_repeat(chr($pad), $pad); // After pad, the str length must be equal to block or its integer multiples

        //encrypt
        $encrypted = mcrypt_generic($module, $encryptStr);

        //Close
        mcrypt_generic_deinit($module);
        mcrypt_module_close($module);

        return base64_encode($encrypted);

    }

    private function encrypts($input,$key) {
        $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $paddedData = static::pkcs5_pad($input, $blockSize);

        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $paddedData, MCRYPT_MODE_CBC, $this->iv);
        return bin2hex($encrypted);

    }
    private static function pkcs5_pad ($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    // curl post请求
    private function https_post($url, $data = null)
    {
        $data = json_encode($data);
        $header [] = 'Content-Type:application/x-www-form-urlencoded';
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        curl_close($ch);
        $tmpInfo1 = json_decode($tmpInfo, true);
        return $tmpInfo1;
    }
    /**
     * 获得随机字符串
     **/
    private function getKey($length = 16)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ2345678';
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

}