<?php
include_once 'app/simple-smiirl-counter.php';

use SimpleSmiirlCounter as SSmiirl;

$SSmiirl = new SSmiirl();

// Show JSON data to Smiirl
// You must declare into your Smiirl account this Url page
// in order to print the number on your physical Smiirl counter
// Please refer to the Project's README.md
echo $SSmiirl->initSmiirlApiPage();
?>
