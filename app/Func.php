<?php
  


// 判断字符串长度是否小于6
function strlenMin($str) {
    return strlen($str) < 6;
}

// 双重md5加密
function md5db($pass){
    $salt = "sadx";
    return md5($salt.md5($pass));
}

// 判断字符串是否为空
function isEmpty($str){
    return $str === null || empty($str);
}

// 将数组json化
function json($arr){
    return json_encode($arr,JSON_UNESCAPED_UNICODE);
}







?>