<?php
  // NOTE: The url must be encoded before getting passed to the proxy.

  $url = isset($_GET['url']) ? $_GET['url'] : false;

  if (!$url) {
    header("HTTP/1.0 400 Bad Request");
    echo "proxy.php failed because url parameter is missing";
    exit();
  }

  if (!parse_url($url, PHP_URL_SCHEME)) {
    echo "No protocol specified for the url, invalid url!";
    exit();
  }

  $file = fopen($url, "r");
  
  if (!$file) {
    echo "Error.\n";
  }
  else {
    header('Content-Type: text/xml');
  
    while (!feof($file)) {
        $data = fgets($file, 4096);
        echo $data;
    }
  }

  fclose($file);
?>
