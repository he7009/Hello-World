<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/9/5
 * Time: 22:47
 */

include __DIR__ . '/Encrypt.php';
$Tljk = include __DIR__ . '/JK-TL.php';

$sign = 'ECAEE25441C3D68DCBF4C5937351626E';
$rsaEncryptData = "nNFWu6keDJH5dm/Sq4N3OsFJoSyPIzyAgyLiCTP/H1gXb7az+CLCNswd6kKW777fsaXMnr+011JJ8Jj+vN3c2D3FV4LQhe/bIGW/AixhLF1HYL1mg5sXcWaSFkt647uaM9QM2VS6NM+xq/DDygMDOpswFCnUQ65L4F2WPNlLQKx/KEALgI2f9zsueoAqEbshrWfh3mgns3ikskzzt3tpQWvk6Pt8tpTJgO5mzwO63KzF2XST31vsk5QG/ewTQFwLPqKasYNkVPTNUuh4Gx5hLtLvimivRs0O0v8k51yjYUrgIdDPzAeQpLhRdWw0WqNz6HSItAUNLcaPS3B9CyzhZQ==";
$reqData = "KClaPU1hmcwiwsVHPGQL7hzBIEi0cirfpcdSqNjIPNvk8QsRJHgz1LJccepfSfzC7YI9UEgxFk8FRyMmZAY8GK4K7syn4x0LGsLLEsPKhh6wgqk+WodCWgPuEeC2DtO9n4I2eGUXaTqOkXsEJMUkAfyJ/ProOzEuM5f1jaQCNkc6SWBfv3tucnba2zIfVQbjH8vWhvV6mb3au3av3/j9/qNbjL+nBz7wCbf31v87gu5tzeWPuoqwBbfUvzfmjGxLsGiS0ALodso2g4ksQNE5PyPSkLBpuuOlRrh+CtAiqiBYzOxf09X4yihpYYruoelah64CwSwRUoTSVk9p8e6PH0RoQztAiQYoo/xMMSlOXbF5U0fjLwK3UluTSTVkV/tLiKnZVZk15ktDAK82McwKuq664pSZYpomru//AkJOFzPc7J5Azr3JpKHJpXyyiRP7";
$seqNO = "615374";
$appAccessToken = "";

$resKey = Encrypt::rsaDecryptByPublicKey($rsaEncryptData,$Tljk['TLPublicKey']);

echo "Res Key : " . $resKey . PHP_EOL;

$aeskey = strtoupper(md5($seqNO . $appAccessToken . $Tljk['appsecretkey'] . $resKey)); //   6A5B68D413EA11C90C2ECF57F659D6C8

echo "AES Key : " . $aeskey . PHP_EOL;

$json = Encrypt::aesDecryptByKey($reqData,$aeskey,$Tljk['iv']);

echo "ReqData : " . $json . PHP_EOL;

$resdata = json_decode($json,true);

$sign2 = strtoupper(md5($json . '615374' .  $Tljk['appsecretkey'] . $resKey));

echo $sign . PHP_EOL;
echo $sign2 . PHP_EOL;
//var_dump($resdata);
