<?php
include_once '../app/simple-smiirl-counter.php';

use SSmiirl\SimpleSmiirlCounter as SSmiirl;

$SSmiirl = new SSmiirl;

$SSmiirl->initEditPage();
$SSmiirl->initUsersAccess();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo Custom Smiirl Counter Api - Allan Dollé</title>
	<meta name="description" content="Demo of the custom counter of the Smiirl company. Easy implementation of the editing action of the Custom Smiirl Counter Api.">
	<meta name="robots" content="index, follow, noodp">
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
      <input id="input" type="number" name="<?php echo $SSmiirl->getJsonKey(); ?>" value="<?php echo $SSmiirl->getDefaultInputValue(); ?>" placeholder="<?php echo $SSmiirl->getFirstAction()[HTML_INPUT]; ?>" required>
			<span class="underline"></span>
      <input id="submit" type="submit" value="<?php echo reset($_ACTIONS)[HTML_SUBMIT]; ?>">
      <?php
      $SSmiirl->printLastLog();
      ?>
    </div>
  </form>
	<footer>
		<div>&copy;
			<a href="//allandolle.fr" title="Web Developer and consultant SEO" rel="author">
				Allan Dollé
			</a>
			<span>|</span>
			<a href="https://github.com/blephy/simple-smiirl-counter" title="Repo of the app Simple Smiirl Counter">
				<img src="//allandolle.fr/images/social/github-white.svg" alt="Aymeric Sans Github White Icon Svg" />
			</a>
			<a href="https://github.com/blephy/simple-smiirl-counter" title="Repo of the app Simple Smiirl Counter">
			Github Repository
			</a>
		</div>
	</footer>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
