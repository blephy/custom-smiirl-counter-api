<?php
include_once '../config/client.php';
include_once '../class/class.file.php';
include_once '../class/class.log.php';

$FILE = new File();
$LOG = new Log();

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
      $checked = 'checked';
      foreach ( $_ACTIONS as $key => $value ) {
        if ($value['active']) {
          echo '<div class="group">'.$value['radio_html'].
               '<input id="'.$key.'" class="params" type="radio" name="PARAMS" value="'.$key.
               '"'.$checked.'></div>';
          echo ('<script>
                document.getElementById("'.$key.'").onclick = function() {
                  changeHTML([
                    "'.$value['input_html'].'",
                    "'.$value['submit_html'].'",
                    "'.$value['display_input'].'"
                  ]);
                }
                 </script>');
          $checked = '';
        }
      }
      ?>
      <label id="html_input" for=""><?php echo reset($_ACTIONS)['input_html']; ?></label>
      <input id="input" type="number" name="<?php echo $FILE->key(); ?>" value="<?php echo $_DEFAULT_INPUT_VALUE; ?>" required>
      <input id="submit" type="submit" value="<?php echo reset($_ACTIONS)['submit_html']; ?>">
      <?php
      $last_5_log = $LOG->getLast(5);
      echo '<span class="log" style="margin-top: 10px;"><strong>HISTORIQUE</strong></span>';
      foreach ($last_5_log as $log) {
        $number = $LOG->getLogInfo($log, 'NUMBER: ');
        $date= $LOG->getLogInfo($log, 'DATE: ');
        $action = $LOG->getLogInfo($log, 'ACTION: ');
        $input = $LOG->getLogInfo($log, 'INPUT: ');
        echo '<span class="log line">'.$date.' -><br>'.$action.' '.$input.' = '.$number.'</span>';
      }
      ?>
    </div>
  </form>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
