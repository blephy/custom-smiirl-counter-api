<?php
//
// Your domaine with extension and protocole
$_ROOT_URL = 'https://dbcrenovations.fr';

// The path to the application in your remote server
// Exemple : $_SERVER['DOCUMENT_ROOT'].'/simple-smiirl-counter' if you upload
// the app under https://your-domaine.fr/simple-smiirl-counter
$_PROJECT_FOLDER = '/simple-smiirl-counter';

// Do not change this variable unless you know what you are doing
$_ROOT_FOLDER = $_SERVER['DOCUMENT_ROOT'].$_PROJECT_FOLDER;

// The URL or relative path of the .json file
// First level is you root folder variable bellow
$_PATH_JSON_FILE = '/number.json';

// The URL or relative path of the log file
// First level is you root folder variable bellow
$_PATH_LOG_FILE = '/log/edit.log';

// The key name in front of the value number in your .json file
$_KEY_NAME = 'number';

// Active or not easter eggs after submitting new number value.
$_ACTIVE_EASTER_EGGS = true;

?>
