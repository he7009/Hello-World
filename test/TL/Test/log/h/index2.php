<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 10:37
 */

$TLPublicKey ="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQSFJN8fA4mxTeAnGGv6
cAmfBJFukQwFsx6TyW/G0agMKZjWEpbt8ei9hPl4tQC3T6XJPVW08QYidYIs0JmP
ftjVoU7hmmzdagXLybAig9C5rNeXXJMKaVYK+iiPc7Aipl0KBeNyVzqQaa4eXXD0
TCyfDG7AClt853+YNiS0R7cp5RK+9ifWO3+CZbYDN7ufSvZQlz5c0CWxVA6TFSH3
7GERbQAxQzf0Tgk8EjEvjMh2W6cIyQ34McytGwJGGlQf2Y1On7ExaZqJ4N3Burbj
vmHPCWh4EMy2pb8hyb8sL/xkt8Hwtagcc7NDGSRjNEQikQqBtno0c7PSwITIaE9q
fwIDAQAB
-----END PUBLIC KEY-----";

$data = "QAb0d+m82qo3Jdml2g5oCbXhBVgCm2xtY9cyKgQxB5HIdaKq3NI+T+zdaFrvixlB4kF4jjmKn2OX5CF1SiqSi167X9vxhm9VTX6Z7iMWTWrXiLR3Kcw2bUfWr+YysbpjuGR4h2TjlP82C4A6+/4A22kg05eRCwTMUCKfzpqwxUXMIqQqwa3kaaATSPiDruA5x/JG9bpnvViHQ8Z7q9i5J2HsADbm7MX9ooz75SFvts5lflSsOSOA2SWBUIPvwpM9QjQ5x2bKFM6BfMaFPojFpAv4oNrULKbe41K5asbTS6TjI65Ng/D7CnZBN8DeB4lHknghv6Z9xaHKnIllTTN11g==";

$data = base64_decode($data);
//$publicKeyFilePath = __DIR__ . "/TLpublicKey.pem";
//$TLPublicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));

openssl_public_decrypt($data,$decrypted,$TLPublicKey,OPENSSL_PKCS1_PADDING);//公钥解密

var_dump($decrypted);
