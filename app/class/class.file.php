<?php
class File {

  protected $_app;
  protected $_content;

  public function __construct($app = null) {
    if ($app != null) {
      $this->_app = $app;
    } else {
      die("App instance not linked to File instance");
    }
  }

  public function content() {
    $this->_content = json_decode(file_get_contents($this->_app->getJsonFilePath()), true);
    return $this->_content;
  }

  public function value() {
    return $this->content()[$this->_app->getJsonKey()];
  }

  public function writeJsonData($json_data) {
    return file_put_contents($this->_app->getJsonFilePath(), $json_data, LOCK_EX);
  }

  public function writeNumber($number) {
    $temp = json_encode([$this->_app->getJsonKey() => $number]);
    return $this->writeJsonData($temp);
  }

}
?>
