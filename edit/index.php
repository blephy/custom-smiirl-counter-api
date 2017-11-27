<?php
include_once '../config/client.php';

$reel_value = json_decode(file_get_contents('../'.$_PATH_JSON_FILE.$_NAME_JSON_FILE), true);

header('Content-type: text/html; charset=utf-8');

if ($_POST) {
  if ($_POST['PARAMS'] && $_POST[$_KEY_NAME] >= 0) {
    switch ($_POST['PARAMS']) {
      case 'plus':
        $new_value = $reel_value[$_KEY_NAME] + $_POST[$_KEY_NAME];
        break;
      case 'minus':
        $new_value = $reel_value[$_KEY_NAME] - $_POST[$_KEY_NAME];
        break;
      case 'erase':
        $new_value = $_POST[$_KEY_NAME];
        break;
      case 'reset':
        $new_value = "0";
        break;
    }
    $data = json_encode([$_KEY_NAME => $new_value]);
    file_put_contents('../'.$_PATH_JSON_FILE.$_NAME_JSON_FILE, $data);

    // Log changes
    $date = date("d/m/Y G:i:s");
    $new_line = " \r\n";
    $ip = "IP: ".$_SERVER['REMOTE_ADDR'];
    $log = $date."      ----->      ".$ip."      :      ".$data.$new_line;
    error_log($log, 3, "log-server.log");
  }
}

$reel_value = json_decode(file_get_contents('../'.$_PATH_JSON_FILE.$_NAME_JSON_FILE), true);
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
      <label class="compteur" for="">Valeur du compteur<br><a href="//dbcrenovation.fr/smiirl/" title="Voir le fichier Json réel"><?php echo $reel_value[$_KEY_NAME]; ?></a></label>
      <div class="group">Chiffre d'affaire HT : <input class="params" type="radio" name="PARAMS" value="plus" checked></div>
      <div class="group">Annulation HT : <input class="params" type="radio" name="PARAMS" value="minus"></div>
      <div class="group">Ecraser : <input class="params" type="radio" name="PARAMS" value="erase"></div>
      <div class="group">Reset : <input class="params" type="radio" name="PARAMS" value="reset"></div>
      <label id="phrase" for="">CA à ajouter :</label>
      <input id="valeur" type="number" name="<?php echo $_KEY_NAME; ?>" value="" required>
      <input id="submit" type="submit" value="Envoyer">
    </div>
  </form>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
