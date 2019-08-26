<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/25
 * Time: 15:55
 */

FWeiChat.AppID:='wx3fbc5dab3664378b';
  FWeiChat.AppSecret:='6f65ef45f764b4deb8c992b3cf8d3ebe';
  FWeiChat.PartnerID:='1491536382';
  FWeiChat.PartnerKey:='Appleidxtipwkilydcx8813601673639';



  procedure TWeiChat.DoLoadUserInfo;
var
  AUrl:String;
  ASuperObject:ISuperObject;
  AResponseString:String;
begin
  FMX.Types.Log.d('OrangeUI DoLoadUserInfo Begin');

  if FAuthCode<>'' then
  begin
        //在定时器中获取到用户信息
        //不然在安卓下会卡死

        //换取AccessToken
        //https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
        AUrl:='https://api.weixin.qq.com/sns/oauth2/access_token?'
+'appid='+Self.FAppID+'&'
+'secret='+FAppSecret+'&'
+'code='+FAuthCode+'&'
+'grant_type=authorization_code';
        FMX.Types.Log.d('OrangeUI DoLoadUserInfo '+AUrl);
        AResponseString:=WeichatHttpsGet(AUrl);

        //{
        //"access_token":"ACCESS_TOKEN",
        //"expires_in":7200,
        //"refresh_token":"REFRESH_TOKEN",
        //"openid":"OPENID",
        //"scope":"SCOPE",
        //"unionid":"o6_bmasdasdsad6_2sgVt7hMZOPfL"
        //}
        //获取返回的Json
        ASuperObject:=TSuperObject.Create(AResponseString);


        //获取授权信息
        FOpenID:=ASuperObject.S['openid'];
        FAccessToken:=ASuperObject.S['access_token'];

        if (FOpenID<>'') and (FAccessToken<>'') then
        begin
          //获取个人信息
          //https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID
          //https://api.weixin.qq.com/sns/userinfo?access_token=10_bGXDD4qyqMkWxyZNo_F1EzYfpa1GS0XpodhLRCwdcHSntycyyppPK_aJpNbinHVChUMmH2rbNQKQ3Oc4AGdfe68gSDp6tUv70kv5Uie2cpg&openid=oy0Tw0e4Fm0vUxn-yIKFsDhVri_s
          AUrl:='https://api.weixin.qq.com/sns/userinfo?'
+'access_token='+Self.FAccessToken+'&'
+'openid='+FOpenId;
          FMX.Types.Log.d('OrangeUI DoLoadUserInfo '+AUrl);
          AResponseString:=WeichatHttpsGet(AUrl);


          ASuperObject:=TSuperObject.Create(AResponseString);


          //获取授权信息
          FNickName:=ASuperObject.S['nickname'];
          FHeadImgUrl:=ASuperObject.S['headimgurl'];
        end;
  end;

end;