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
    <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
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
    </div>
  </form>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
