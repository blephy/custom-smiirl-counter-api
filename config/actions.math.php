<?php
switch ($_POST['PARAMS']) {
  case 'AJOUTER':
    $new_value = $reel_value[$FILE->key()] + $_POST[$FILE->key()];
    break;
  case 'ENLEVER':
    $new_value = $reel_value[$FILE->key()] - $_POST[$FILE->key()];
    break;
  case 'ECRASER':
    $new_value = $_POST[$FILE->key()];
    break;
  case 'RESET':
    $new_value = "0";
    break;
}
?>
