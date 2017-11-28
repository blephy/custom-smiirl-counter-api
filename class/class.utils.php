<?php
class Utils {

  public $actions;

  public function __construct() {
    global $_ACTIONS;

    $this->actions = $_ACTIONS;
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
