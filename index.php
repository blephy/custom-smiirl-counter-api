<?php
include_once 'app/custom-smiirl-counter-api.php';

use CSmiirl\CSmiirl as CSmiirl;

$CSmiirl = new CSmiirl;

// Show JSON data to Smiirl
// You must declare into your Smiirl account this Url page
// in order to print the number on your physical Smiirl counter
// Please refer to the Project's README.md
echo $CSmiirl->initSmiirlApiPage();
?>
