<?php

  // 引入类
  require_once('inc/require.php');

  if(isset($_GET['id'])) {
    
    $url_c = new url();

    // 获取目标网址
    $url = $url_c->get_url($_GET['id']);
    // 重定向至目标网址
    if($url) {
      header('Location: ' . $url);
      exit;
    }

  }

?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo get_title() . ' - ' . get_description(); ?></title>
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <link type="text/css" rel="stylesheet" href="asset/css/main.css" />
  </head>
  <body>
    <div class="wrap">
      <div class="meta">
        <h2 class="title"><?php echo get_title(); ?></h2>
        <h3 class="description"><?php echo get_description(); ?></h3>
      </div>
      <div class="link-area">
        <input id="url" type="text" placeholder="https://" />
        <input id="submit" type="button" value="Generate" onclick="APP.fn.setUrl(this)" />
      </div>
      <div class="footer">Copyright &copy; <a href="https://github.com/Caringor/" title="Carignor" target="_blank">Caringor</a> / <a href="https://github.com/Caringor/CRZ.im/" title="Fork me on Github" target="_blank">Fork me on Github</a>.</div>
    </div>
  </body>
  <!-- JS -->
  <script type="text/javascript" src="asset/js/app.js"></script>
</html>