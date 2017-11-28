<?php
include_once '../config/client.php';
include_once '../class/class.file.php';
include_once '../class/class.log.php';
include_once '../class/class.utils.php';

$FILE = new File();
$LOG = new Log();
$UTILS = new Utils();

$reel_value = $FILE->content();

header('Content-type: text/html; charset=utf-8');

if ($_POST) {
  if ( $_POST['PARAMS'] && $_POST[$FILE->key()] >= 0) {
    include_once '../config/actions.math.php';
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
    <div class="wrapper">
      <label class="compteur" for="">
        <?php echo $_HTML_COUNT; ?><br>
        <a href="//<?php echo $_ROOT_URL.$_PROJECT_FOLDER; ?>" title="Voir le fichier Json réel">
          <?php echo $FILE->value(); ?>
        </a>
      </label>
      <?php
      $UTILS->printHtmlRadios();
      ?>
      <label id="html_input" for=""><?php echo reset($_ACTIONS)['input_html']; ?></label>
      <input id="input" type="number" name="<?php echo $FILE->key(); ?>" value="<?php echo $_DEFAULT_INPUT_VALUE; ?>" required>
      <input id="submit" type="submit" value="<?php echo reset($_ACTIONS)['submit_html']; ?>">
      <?php
      $LOG->printLast(5, 'HISTORIQUE');
      ?>
    </div>
  </form>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
