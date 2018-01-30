<?php
class CookieListener {

  protected $_username;
  protected $_password;

  public function __construct() {
    if ( $this->isClientHasCookies() ) {
      $this->_username = $this->getCookie(USERNAME);
      $this->_password = $this->getCookie(PASSWORD);
    }
  }

  public function isClientHasCookies() {
    return ( isset($_COOKIE[USERNAME]) && isset($_COOKIE[PASSWORD]) ) ? true : false;
  }

  public function getCookie($name) {
    return $_COOKIE[$name];
  }

  public function setCookie($name, $value, $expire) {
    $time = time();
    return setcookie( $name, $value, $time+$expire);
  }

  public function getUsername() {
    return $this->_username;
  }

  public function getPassword() {
    return $this->_password;
  }
}
?>
