<?php

echo "<html>";
echo "<body>";

$file_input_name = 'file';
if (!empty($_FILES[$file_input_name])) {
  if (!$_FILES[$file_input_name]['error']) {
    foreach ($_FILES[$file_input_name] as $k => $v) {
      echo "$k : $v<br>";
    }
  }
}

$upload_url = 'index.php';
echo "<form action=$upload_url method='post' enctype='multipart/form-data'>";
echo "<label for='file'>Filename:</label>";
echo "<input type='file' name=$file_input_name id='file'><br>";
echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

echo "</body>";
echo "<html>";


?>