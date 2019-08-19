<?php

$privateKeyFilePath = __DIR__ . '/jk_private_key.pem';
$publicKeyFilePath = __DIR__ . '/jk_public_key.pem';

$privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFilePath));
$publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));

($privateKey && $publicKey) or die('密钥或者公钥不可用');

// 加密数据
$originalData = '28934823#ck190810001#3853';

// 加密以后的数据
$encryptData = '';

echo '原数据为:', $originalData, PHP_EOL;

///////////////////////////////用私钥加密////////////////////////

if (openssl_private_encrypt($originalData, $encryptData, $privateKey)) {

    // 加密后 可以base64_encode后方便在网址中传输
    echo '加密成功，加密后数据为:',$encryptData, PHP_EOL;
    echo '加密成功，加密后数据(base64_encode后)为:', base64_encode($encryptData), PHP_EOL;

} else {

    exit('加密失败');

}

///////////////////////////////用公钥解密////////////////////////

//解密以后的数据

$decryptData ='';

if (openssl_public_decrypt($encryptData, $decryptData, $publicKey)) {

    echo '解密成功，解密后数据为:', $decryptData, PHP_EOL;

} else {

    exit('解密失败');

}

