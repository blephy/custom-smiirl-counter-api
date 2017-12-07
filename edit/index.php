<?php
include_once '../app/custom-smiirl-counter-api.php';

use CSmiirl\CSmiirl as CSmiirl;

$CSmiirl = new CSmiirl;

$CSmiirl->initEditPage();
$CSmiirl->initUsersAccess();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo Custom Smiirl Counter Api - Allan Dollé</title>
	<meta name="description" content="Demo of the custom counter of the Smiirl company. Easy implementation, customize actions and interface with ease. Change the number value of your custom Smiirl counter !">
	<meta name="robots" content="index, follow, noodp">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Custom Smiirl Counter API">
	<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#199a8f">
  <meta name="apple-mobile-web-app-title" content="Custom Smiirl Counter API">
	<meta name="theme-color" content="#199a8f">
  <link rel="stylesheet" href="index.css">
	<meta property="og:url" content="https://allandolle.fr/custom-smiirl-counter-api/edit/">
	<meta property="og:title" content="Custom Smiirl Counter API - Allan Dollé">
	<meta property="og:site_name" content="Custom Smiirl Counter API - Allan Dollé">
  <meta property="og:description" content="Demo of the custom counter of the Smiirl company. Easy implementation, customize actions and interface with ease. Change the number value of your custom Smiirl counter !">
  <meta property="og:image" content="https://allandolle.fr/custom-smiirl-counter-api/screenshot.png">
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="1600" />
	<meta property="og:image:height" content="892" />
  <meta property="og:image" content="https://allandolle.fr/custom-smiirl-counter-api/screenshot-log-panel.png">
  <meta property="og:image" content="https://allandolle.fr/custom-smiirl-counter-apiscreenshot-responsive-mobile.jpg/">
	<meta property="og:locale" content="en_EN">
	<meta property="og:type" content="website">
	<meta name="twitter:card" content="summary">
  <meta name="twitter:description" content="Demo of the custom counter of the Smiirl company. Easy implementation, customize actions and interface with ease. Change the number value of your custom Smiirl counter !">
  <meta name="twitter:title" content="Custom Smiirl Counter API - Allan Dollé">
  <meta name="twitter:image" content="https://allandolle.fr/custom-smiirl-counter-api/screenshot.png">
  <meta name="twitter:image" content="https://allandolle.fr/custom-smiirl-counter-api/screenshot-log-panel.png">
  <meta name="twitter:image" content="https://allandolle.fr/custom-smiirl-counter-apiscreenshot-responsive-mobile.jpg/">
  <link rel="canonical" href="https://allandolle.fr/custom-smiirl-counter-api/edit/">
</head>
<script>(function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-96248110-1', 'auto');
    ga('send', 'pageview');
</script>

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
    </div>
		<div class="pin">
			<?php echo $CSmiirl->getDefaultTitleLog(); ?>
		</div>
		<div class="wrapper logger">
			<?php
			$CSmiirl->printLastLog(20, 'Historique');
			?>
		</div>
		<footer>
			<div>
				<a href="//allandolle.fr" title="Web Developer and consultant SEO" rel="author">
					&copy;
					Allan Dollé
				</a>
				<span>|</span>
				<a href="https://github.com/blephy/custom-smiirl-counter-api" title="Repo of the app Custom Smiirl Counter API">
					<img src="//allandolle.fr/images/social/github-white.svg" alt="Aymeric Sans Github White Icon Svg" />
					Github Repository
				</a>
			</div>
		</footer>
  </form>
	<audio id="audio">
		<source src="soundeffect.radio.clic.mp3"></source>
	</audio>
  <?php if ( $_ACTIVE_EASTER_EGGS ) { include '../template/easter-egg.php';} ?>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>
