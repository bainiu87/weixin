<?php
//使用curl调用接口返回json数据包，并处理
function curlGet($url){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不验证证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不验证证书
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        $jsonObj=json_decode($result);
        return $jsonObj;
}
//使用CURL post请求 并接受回传数据
function curlPost($url,$date){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不验证证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不验证证书
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $date);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $jsonObj=json_decode($result);
    return $jsonObj;
}

