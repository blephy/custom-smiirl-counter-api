<?php
class ActionRadios {

  protected $_app;

  public function __construct($app = null) {
    if ($app != null) {
      $this->_app = $app;
    } else {
      die("App instance not linked to ActionRadios instance");
    }
  }

  public function printHtmlRadios($actions = null) {
    $actions ? $temp_actions = $actions : $temp_actions = $this->_app->getActions();
    $checked = 'checked';
    foreach ( $temp_actions as $key => $value ) {
      if ($value[ACTIVE]) {
        echo '<div class="group">'.
             '<input id="'.$key.
              '" class="params" type="radio" name="'.RADIO_PARAMS.'" value="'.$key.
              '"'.$checked.'>'.
             '<label for="'.$key.
             '">'.$value[HTML_RADIO].'</label>'.
             '<span class="check"></span>'.
             '</div>';
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
