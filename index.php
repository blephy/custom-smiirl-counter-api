<?php
include_once 'config/client.php';
include_once 'class/class.file.php';

$FILE = new File();

// We return Json data, so editing the header.
header('Content-type: application/json; charset=utf-8');

// Get the .json file content
$reel_value = $FILE->content();

// Compile json data with .json file content
$data = json_encode([$FILE->key() => $reel_value[$FILE->key()]]);

// Show JSON data to Smiirl
echo $data;
?>
