<?php
class AuthListener {

  protected $_app;

  public function __construct($app = null) {
    $this->_app = ( $app ?? die("App instance not linked to AuthListener instance") );
  }

  public function initAuthListener() {
    if ($_POST) {

    }
  }

}
?>
