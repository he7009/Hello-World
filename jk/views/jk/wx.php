<h3>΢�Ź��ں�֧��</h3>
<script>
    function onBridgeReady(){
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest', {
                "appId":"wx2421b1c4370ec43b",     //���ں����ƣ����̻�����
                "timeStamp":"<?php echo $resArr['body']['timestamp'];?>",         //ʱ�������1970������������
                "nonceStr":"<?php echo $resArr['body']['remark'];?>", //�����
                "package":"<?php echo $resArr['body']['quickRspString'];?>",
                "signType":"<?php echo $resArr['body']['sgnTp'];?>",         //΢��ǩ����ʽ��
                "paySign":"<?php echo $resArr['body']['signCert'];?>" //΢��ǩ��
            },
            function(res){
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    // ʹ�����Ϸ�ʽ�ж�ǰ�˷���,΢���Ŷ�֣����ʾ��
                    //res.err_msg�����û�֧���ɹ��󷵻�ok����������֤�����Կɿ���
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