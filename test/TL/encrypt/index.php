<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/9/5
 * Time: 22:47
 */

include __DIR__ . '/Encrypt.php';
$Tljk = include __DIR__ . '/JK-TL.php';

$sign = '56961B5FA98A702A3EF4C4AB813913DF';
$rsaEncryptData = "uqwqYuqshMElidOFKcp4OJCzZOoMWKo5Xsl0+Om5DBrx3cqb7MXD+c2NmovB76CW7uBki8g+axiUjGVgvpCoa1EC6CM\/qZXeYmaabUAcVdM7ewS4kFUViEjFBWhMhEqksESZqE95e68EzzfLWwAJLLpZNLIwLLDh5bdTogBPXwEAykgzwoRoIRyetST3Bme1424wZD1VIetw4+x8jwGvrP51uHKAWkGyqHVMDFhM3eGHMw8pABrIXYC2ZaafghyW6IIP7pmybWeNoGge615HabhOsoYlBadK4cp7GgKfTRuvZV5lMUtZ1Ylkn7jvWsTxOMWqMxfp8shEnwlnWlSg8g==";
$reqData = "t0kZ4FeliCJEb92cWsecdubzvzJXn7JIwXzkVn4WY\/eM1C1UBP8dY4MEcoo7Ex0+CXa182hUWbMkIDubIeP8miNeFvLcQPe6JaJ5QCdKK7RZmKlwEIimM\/ILUExec0p5frfoiqR0CAsC8Wk3MsALQ0xTptrd59GiPRTLNBIl4b7hvKiqZcbyBXI\/QiA1jTwNfmVY2VsDoDRsPUrKDWWCZhnGbW0nnQipQCgUJ3l0mXH8xtgw5WCdKR9F9MdzcEADFUl7X6ei3drUbmFaqYnMGbpmvieYtErVl4UHkMhzn1HET03XDCXugW9kDK8Vy8\/70k1qT+cse3tMrPBPtttka2Nf1TEuvyVKSQCricU6VdPqNt8Xf+8gigCIf4p18D6owmwiNOn2lTk5WAJMKy3VWNnFYlYR3Z\/KlQZtdz\/lvZB1WM1YqDTki9\/z7jGQuWmN";
$seqNO = "298519";
$appAccessToken = "";

$resKey = Encrypt::rsaDecryptByPublicKey($rsaEncryptData,$Tljk['TLPublicKey']);  //    7C9C3D44CF6DA002A33194CDC5398527

$aeskey = strtoupper(md5($seqNO . $appAccessToken . $Tljk['appsecretkey'] . $resKey)); //   6A5B68D413EA11C90C2ECF57F659D6C8

$json = Encrypt::aesDecryptByKey($reqData,$aeskey,$Tljk['iv']); //   {"body":{"ccy":"156","tranAmt":"10","inetNo":"b18ea6fa3353b732b0bc1f1e9e1e87e8","ordrSt":"00","mechNo":"8201908280041143","tranType":"1007","inetSeqNo":"82019090521480251398953210256246"},"serviceId":"1100200008305","head":{"mrchSno":"11001020190905000000158216","txTime":"20190905111744","txSno":"11001020190905000000158216"}}


$resdata = json_decode($json,true);
var_dump($resdata);
