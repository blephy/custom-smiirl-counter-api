<?php
class User {

  protected $_app;
  protected $_name;
  protected $_password;
  protected $_access_actions;
  protected $_access_functionality;

  public function __construct($app = null,
                              $name = null,
                              $params = null) {
    $this->_app = ( $app ?? die("App instance not linked to User instance") );
    $this->_name = ( $name ?? die("User name empty") );
    $this->_password = ( $params[PASSWORD] ?? die("User password empty") );
    $this->_access_actions = ( $params[ACCESS_ACTIONS] ?? die("User access actions empty") );
    $this->_access_functionality = ( $params[ACCESS_FUNCTIONALITY] ?? die("User access functionality empty") );
    return $this;
  }
}
?>
