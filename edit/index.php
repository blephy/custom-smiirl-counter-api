<?php
include_once '../app/custom-smiirl-counter-api.php';

use CSmiirl\CustomSmiirlCounter as CSmiirl;

$CSmiirl = new CSmiirl;

$CSmiirl->initEditPage();
$CSmiirl->initUsersAccess();
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
          <?php echo $CSmiirl->getCounterValue(); ?>
        </a>
      </label>
      <?php
      $CSmiirl->printActionsRadios();
      ?>
      <input id="input" type="number" name="<?php echo $CSmiirl->getJsonKey(); ?>" value="<?php echo $CSmiirl->getDefaultInputValue(); ?>" placeholder="<?php echo $CSmiirl->getFirstAction()[HTML_INPUT]; ?>" required>
			<span class="underline"></span>
      <input id="submit" type="submit" value="<?php echo reset($_ACTIONS)[HTML_SUBMIT]; ?>">
      <?php
      $CSmiirl->printLastLog();
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
	<audio id="audio">
		<source src="effect.onhover.mp3"></source>
	</audio>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
