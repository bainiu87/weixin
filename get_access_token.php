<?php
/*
 * 获取access_token 码，并将码保存在文件中，同时设置有效时间7000
 * 需要使用curl  发送get请求
 *   */
require_once 'curl_wechat_api.php';
function getAccessToken(){
    $appid="";
    $appsecret="";
    $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
    if (file_exists("access_token.json")){
        $access_token=file_get_contents("access_token.json");
        $acet=json_decode($access_token);
        if ($acet->expires_in <= time()){
            $accessToken=curlGet($url);
            $accessToken->expires_in=time()+7000;
            $accessStr=json_encode($accessToken);
            $fp=fopen("access_token.json","w");
            fwrite($fp,$accessStr);
            fclose($fp);
            return   $accessToken->access_token;
        }else{
            return   $acet->access_token;
        }
    }else{
        $accessToken=curlGet($url);
        $accessToken->expires_in=time()+7000;
        $accessStr=json_encode($accessToken);
        $fp=fopen("access_token.json","w");
        fwrite($fp,$accessStr);
        fclose($fp);
        return   $accessToken->access_token;
    }
}