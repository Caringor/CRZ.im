<?php

  // 获取网站标题
  function get_title() {
    global $config;
    return $config['title'];
  }

  // 获取网站简介
  function get_description() {
    global $config;
    return $config['description'];
  }

  // 获取用户 IP
  function get_ip() {
    $ip = '0.0.0.0';
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED'];
    } else if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_FORWARDED'])) {
      $ip = $_SERVER['HTTP_FORWARDED'];
    } else if(!empty($_SERVER['REMOTE_ADDR'])) {
      $ip= $_SERVER['REMOTE_ADDR'];
    } else if(!empty($_SERVER['HTTP_VIA'])) {
      $ip = $_SERVER['HTTP_VIA '];
    }
    return $ip;
  }

  // 获取用户 UserAgent
  function get_ua() {
    $ua = 'N/A';
    if(!empty($_SERVER['HTTP_USER_AGENT'])) $ua = $_SERVER['HTTP_USER_AGENT'];
    return $ua;
  }

  // 获取程序所在路径
  function get_uri() {
    global $config;
    // 获取传输协议
    $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    // 获取域名
    $url .= $_SERVER['HTTP_HOST'];
    // 获取程序所在路径
    $url .= $config['path'];
    if(substr($url, strlen($url) - 1) != '/') $url .= '/';

    return $url;
  }

?>