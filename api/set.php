<?php

  // 引入类
  require_once('../inc/require.php');
  global $config;
  $url_c = new url();

  $opt = [];
  $opt['success'] = 'false';

  $request_arr = json_decode(file_get_contents('php://input'), true);
  if(isset($request_arr['url'])) {
    $opt['success'] = 'true';
    $opt['content']['url'] = $url_c->set_url($request_arr['url'], $config['length']);
  } else {
    $opt['content'] = '缺少必要参数!';
  }

  echo json_encode($opt);

?>