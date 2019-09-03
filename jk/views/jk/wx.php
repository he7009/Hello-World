<h3>微信公众号支付</h3>
<script>
    function onBridgeReady(){
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest', {
                "appId":"wx2421b1c4370ec43b",     //公众号名称，由商户传入
                "timeStamp":"<?php echo $resArr['body']['timestamp'];?>",         //时间戳，自1970年以来的秒数
                "nonceStr":"<?php echo $resArr['body']['remark'];?>", //随机串
                "package":"<?php echo $resArr['body']['quickRspString'];?>",
                "signType":"<?php echo $resArr['body']['sgnTp'];?>",         //微信签名方式：
                "paySign":"<?php echo $resArr['body']['signCert'];?>" //微信签名
            },
            function(res){
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    // 使用以上方式判断前端返回,微信团队郑重提示：
                    //res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
                }
            });
    }
    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }
    }else{
        onBridgeReady();
    }
</script>