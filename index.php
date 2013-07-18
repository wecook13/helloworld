<?php

// upload to AWS S3
require '../aws/aws.phar';    
use Aws\S3\S3Client;

echo "<html>";
echo "<body>";

$file_input_name = 'file';
$presigned_url = NULL;
if (!empty($_FILES[$file_input_name])) {
  if (!$_FILES[$file_input_name]['error']) {

    $file_name = $_FILES[$file_input_name]['name'];
    $file = $_FILES[$file_input_name]['tmp_name'];


    // Instantiate the S3 client with your AWS credentials and desired AWS region
    $client = S3Client::factory(
				array(
				      'key'    => 'AKIAJZ5HPTXZLKU2T4EA',
				      'secret' => '6PyadUJaZfefDO9hFI3EyKo6HJeaB/Crmj+ATCzj',
				      'region' => 'us-west-2',
				      )
				);
    $bucket = 'wecooktests3';   
    $result = $client->putObject(
				 array(
				       'Bucket' => $bucket,
				       'Key' => $file_name,
				       'ContentType' => mime_content_type($file),
				       'Body' => \Guzzle\Http\EntityBody::factory(fopen($file, 'r'))
				       )
				 );
    $client->waitUntilObjectExists(array(
					 'Bucket' => $bucket,
					 'Key' => $file_name,
					 ));				     
    if ($result['ObjectURL']) {
      $presigned_url = $client->createPresignedUrl($client->get($bucket.'/'.$file_name), time() + 24 * 3600 * 365 * 5);
    }
  }
}

if ($presigned_url) {
  echo "<image src='$presigned_url'><br>";
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