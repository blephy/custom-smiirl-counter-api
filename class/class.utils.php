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
        if ( in_array($_POST['PARAMS'], array_keys($this->actions)) ) {
          $math = $this->actions[$_POST['PARAMS']][MATH];
          $result = $math($reel_value[$this->file->key()], $_POST[$this->file->key()]);
          $this->file->writeNumber($result);
          $this->log->write($result);
        }
      }
    }
  }

  public function printHtmlRadios($actions = null) {
    $actions ? $temp_actions = $actions : $temp_actions = $this->actions;
    $checked = 'checked';
    foreach ( $temp_actions as $key => $value ) {
      if ($value[ACTIVE]) {
        echo '<div class="group">'.$value[HTML_RADIO].
             '<input id="'.$key.
             '" class="params" type="radio" name="PARAMS" value="'.$key.
             '"'.$checked.'></div>';
        echo ('<script>
              document.getElementById("'.$key.'").onclick = function() {
                changeHTML([
                  "'.$value[HTML_INPUT].'",
                  "'.$value[HTML_SUBMIT].'",
                  "'.$value[DISPLAY_INPUT].'"
                ]);
              }
              </script>');
        $checked = '';
      }
    }
  }
}
?>
