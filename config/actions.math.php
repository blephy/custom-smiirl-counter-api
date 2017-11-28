<?php
switch ($_POST['PARAMS']) {
  case 'plus':
    $new_value = $reel_value[$FILE->key()] + $_POST[$FILE->key()];
    break;
  case 'minus':
    $new_value = $reel_value[$FILE->key()] - $_POST[$FILE->key()];
    break;
  case 'erase':
    $new_value = $_POST[$FILE->key()];
    break;
  case 'reset':
    $new_value = "0";
    break;
}
?>
