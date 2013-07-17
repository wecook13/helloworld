<?php

define('AWS_PHOTO_BUCKET', 'wecooktests3');

foreach ($_SERVER as $k => $v) {
  echo "$k = $v";
  echo "<br>";
}

echo "<br>";
foreach ($_GET as $k => $v) {
  echo "$k = $v";
  echo "<br>";
}

echo "<br>";
foreach ($_POST as $k => $v) {
  echo "$k = $v";
  echo "<br>";
}

echo "<br>";
foreach ($_FILES as $k => $v) {
  if (strstr($v['type'], 'image/')) {
    echo 'prepare to upload ' . $v['name'];
    echo "<br>";
  }
}

?>