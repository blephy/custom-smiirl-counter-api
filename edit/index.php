<?php
include_once '../config/client.php';
include_once '../class/class.file.php';
include_once '../class/class.log.php';

$FILE = new File();
$LOG = new Log();

$reel_value = $FILE->content();

header('Content-type: text/html; charset=utf-8');

if ($_POST) {
  if ($_POST['PARAMS'] && $_POST[$FILE->key()] >= 0) {
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

    $FILE->writeNumber($new_value);
    $LOG->write($new_value);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DBC Smiirl</title>
	<meta name="description" content="Formulaire de modification Smiirl">
	<meta name="robots" content="noindex, nofollow, noodp">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <form class="" action="" method="post">
    <?php if ($_ACTIVE_EASTER_EGGS) { include '../template/easter-egg.php';} ?>
    <div class="wrapper">
      <label class="compteur" for="">Valeur du compteur<br><a href="//dbcrenovation.fr/smiirl/" title="Voir le fichier Json réel"><?php echo $FILE->value(); ?></a></label>
      <div class="group">Chiffre d'affaire HT : <input class="params" type="radio" name="PARAMS" value="plus" checked></div>
      <div class="group">Annulation HT : <input class="params" type="radio" name="PARAMS" value="minus"></div>
      <div class="group">Ecraser : <input class="params" type="radio" name="PARAMS" value="erase"></div>
      <div class="group">Reset : <input class="params" type="radio" name="PARAMS" value="reset"></div>
      <label id="phrase" for="">CA à ajouter :</label>
      <input id="valeur" type="number" name="<?php echo $FILE->key(); ?>" value="" required>
      <input id="submit" type="submit" value="Envoyer">
    </div>
  </form>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
