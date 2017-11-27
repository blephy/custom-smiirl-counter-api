<?php
include_once 'config/client.php';

// We return Json data, so editing the header.
header('Content-type: application/json; charset=utf-8');

// Get the .json file content
$reel_value = json_decode(file_get_contents($_PATH_JSON_FILE.$_NAME_JSON_FILE), true);

// Compile json data with .json file content
$data = json_encode([$_KEY_NAME => $reel_value[$_KEY_NAME]]);

// Show JSON data to Smiirl
echo $data;
?>
