<?php
include_once '../app/simple-smiirl-counter.php';

use SSmiirl\SimpleSmiirlCounter as SSmiirl;

$SSmiirl = new SSmiirl;

$SSmiirl->initEditPage();
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
          <?php echo $SSmiirl->getCounterValue(); ?>
        </a>
      </label>
      <?php
      $SSmiirl->printActionsRadios();
      ?>
      <label id="html_input" for=""><?php echo $SSmiirl->getFirstAction()[HTML_INPUT]; ?></label>
      <input id="input" type="number" name="<?php echo $SSmiirl->getJsonKey(); ?>" value="<?php echo $SSmiirl->getDefaultInputValue(); ?>" required>
      <input id="submit" type="submit" value="<?php echo reset($_ACTIONS)[HTML_SUBMIT]; ?>">
      <?php
      $SSmiirl->printLastLog();
      ?>
    </div>
  </form>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
