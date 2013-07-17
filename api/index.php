<?php

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


?>