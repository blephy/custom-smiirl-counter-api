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

  public function isFileExist() {
    return file_exists($this->_app->getJsonFilePath());
  }

  public function initFile() {
    $temp = json_encode([$this->_app->getJsonKey() => 0]);
    $parts = explode('/', $this->_app->getJsonFilePath());
    $file = array_pop($parts);
    $dir = '';
    foreach($parts as $part) {
      if(!is_dir($dir .= "/$part")) mkdir($dir);
    }
    return file_put_contents($this->_app->getJsonFilePath(), $temp, LOCK_EX);
  }

  public function content() {
    if ($this->isFileExist()) {
      $this->_content = json_decode(file_get_contents($this->_app->getJsonFilePath()), true);
    } else {
      $this->initFile();
      $this->_content = json_decode(file_get_contents($this->_app->getJsonFilePath()), true);
    }
    return $this->_content;
  }

  public function value() {
    return $this->content()[$this->_app->getJsonKey()];
  }

  public function writeJsonData($json_data) {
    if ($this->isFileExist()) {
      return file_put_contents($this->_app->getJsonFilePath(), $json_data, LOCK_EX);
    } else {
      $this->initFile();
      return file_put_contents($this->_app->getJsonFilePath(), $json_data, LOCK_EX);
    }
  }

  public function writeNumber($number) {
    $temp = json_encode([$this->_app->getJsonKey() => $number]);
    return $this->writeJsonData($temp);
  }
}
?>
