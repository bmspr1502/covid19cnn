<?php
 //header("Access-Control-Allow-Origin: *");
$url = 'http://192.168.43.13:5000/predict';
$data = array('path' => 'C:\\xampp\\htdocs\\covid19cnn\\api\\img\\Covid (116).png');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\nAccess-Control-Allow-Origin: *",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);