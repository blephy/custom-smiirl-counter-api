<?php
// Your domaine name. Without protocol
// Do not change this variable unless you know what you are doing
$_ROOT_URL = $_SERVER['HTTP_HOST'];

// The path to the application in your remote server
// Exemple : '/simple-smiirl-counter' if you upload
// the app under https://your-domaine.fr/simple-smiirl-counter
// [STRING]
$_PROJECT_FOLDER = '/simple-smiirl-counter';

// Do not change this variable unless you know what you are doing
$_ROOT_FOLDER = $_SERVER['DOCUMENT_ROOT'].$_PROJECT_FOLDER;

// The URL or relative path of the .json file
// First level is you root folder variable bellow
// [STRING]
$_PATH_JSON_FILE = '/number.json';

// The URL or relative path of the log file
// First level is you root folder variable bellow
// [STRING]
$_PATH_LOG_FILE = '/log/edit.log';

// The key name in front of the value number in your .json file
// [STRING]
$_KEY_NAME = 'number';

// Active or not easter eggs after submitting new number value.
// [BOOLEAN]
$_ACTIVE_EASTER_EGGS = true;

// Default value for the input value
// [STRING]
$_DEFAULT_INPUT_VALUE = '';

// HTML Displayed on top of Counter's number
$_HTML_COUNT = 'Valeur du compteur';

// Possible actions implemented
// [ARRAY]
// [STRING](action name) => [
//    'active' => [BOOL](active or not this action),
//    'radio_html' => [STRING](HTML output of radios form),
//    'input_html' => [STRING](HTML output of input form),
//    'submit_html' => [STRING](HTML output of submit button)
// First value is the default checked html radio
$_ACTIONS = [
  'AJOUTER' => [
    'active' => true,
    'radio_html' => 'Chiffre d\'affaire HT : ',
    'input_html' => 'CA à ajouter : ',
    'display_input' => true,
    'submit_html' => 'Ajouter',
    'mathematic' => function ($old, $new) {
      return $old + $new;
    }
  ],
  'ENLEVER' => [
    'active' => true,
    'radio_html' => 'Annulation HT : ',
    'input_html' => 'CA à enlever : ',
    'display_input' => true,
    'submit_html' => 'Enlever',
    'mathematic' => function ($old, $new) {
      return $old - $new;
    }
  ],
  'ECRASER' => [
    'active' => true,
    'radio_html' => 'Ecraser : ',
    'input_html' => 'Changer la valeur en : ',
    'display_input' => true,
    'submit_html' => 'Redéfinir',
    'mathematic' => function ($old, $new) {
      return $new;
    }
  ],
  'RESET' => [
    'active' => true,
    'radio_html' => 'Reset : ',
    'input_html' => 'Votre compteur sera remis à zero : ',
    'display_input' => false,
    'submit_html' => 'Reset',
    'mathematic' => function ($old, $new) {
      return 0;
    }
  ]
];

?>
