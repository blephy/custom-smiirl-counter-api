<?php
class Utils {

  public $actions;
  public $file;
  public $log;

  public function __construct() {
    global $_ACTIONS, $FILE, $LOG;

    $this->actions = $_ACTIONS;
    $this->file = $FILE;
    $this->log = $LOG;
  }

  public function listenRequest() {
    $reel_value = $this->file->content();

    if ($_POST) {
      if ( $_POST['PARAMS'] && $_POST[$this->file->key()] >= 0) {
        include_once '../config/actions.math.php';
        $this->file->writeNumber($new_value);
        $this->log->write($new_value);
      }
    }
  }

  public function printHtmlRadios($actions = null) {
    $actions ? $temp_actions = $actions : $temp_actions = $this->actions;
    $checked = 'checked';
    foreach ( $temp_actions as $key => $value ) {
      if ($value['active']) {
        echo '<div class="group">'.$value['radio_html'].
             '<input id="'.$key.
             '" class="params" type="radio" name="PARAMS" value="'.$key.
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
  }
}
?>
