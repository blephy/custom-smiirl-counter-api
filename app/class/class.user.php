<?php
class User {

  protected $_app;
  protected $_name;
  protected $_password;
  protected $_access_type;

  public function __construct($app = null,
                              $name = null,
                              $params = null) {
    if ($app != null) {
      $this->_app = $app;
    } else {
      die("App instance not linked to User instance");
    }
    if ($name != null) {
      $this->_name = $name;
    } else {
      die("User name empty");
    }
    if ($params != null) {
      $this->_password = $params[PASSWORD];
      $this->_access_type = $params[ACCESS_TYPE];
    }
    return $this;
  }
}
?>
