<?php
class PostListener {

  protected $_app;

  public function __construct($app = null) {
    if ($app != null) {
      $this->_app = $app;
      $this->initEditPage();
    } else {
      die("App instance not linked to PostListener instance");
    }
  }

  public function initEditPage() {
    header('Content-type: text/html; charset=utf-8');
    $reel_value = $this->_app->getFileInstance()->content();

    if ($_POST) {
      if ( $_POST[RADIO_PARAMS] && $_POST[$this->_app->getJsonKey()] >= 0) {
        if ( in_array($_POST[RADIO_PARAMS], array_keys($this->_app->getActions())) ) {
          $math = $this->_app->getActions()[$_POST[RADIO_PARAMS]][MATH];
          $result = $math($reel_value[$this->_app->getJsonKey()], $_POST[$this->_app->getJsonKey()]);
          $this->_app->getFileInstance()->writeNumber($result);
          $this->_app->getLogInstance()->write($result);
        }
      }
    }
  }
}
?>
