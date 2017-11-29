<?php
switch ($_POST['PARAMS']) {
  case 'AJOUTER':
    $new_value = $reel_value[$this->file->key()] + $_POST[$this->file->key()];
    break;
  case 'ENLEVER':
    $new_value = $reel_value[$this->file->key()] - $_POST[$this->file->key()];
    break;
  case 'ECRASER':
    $new_value = $_POST[$this->file->key()];
    break;
  case 'RESET':
    $new_value = "0";
    break;
}
?>
