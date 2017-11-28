<?php
class File {

  private $_path_to_file;
  private $_json_key;
  private $_content;

  public function __construct($path_to_file = null, $json_key = null) {
    global $_ROOT_FOLDER, $_PATH_JSON_FILE, $_KEY_NAME;

    if ($path_to_file != null) {
      $this->_path_to_file = $path_to_file;
    } else {
      $this->_path_to_file = $_ROOT_FOLDER.$_PATH_JSON_FILE;
    }
    if ($json_key != null) {
      $this->_json_key = $json_key;
    } else {
      $this->_json_key = $_KEY_NAME;
    }
  }

  public function path() {
    return $this->_path_to_file;
  }

  public function key() {
    return $this->_json_key;
  }

  public function content() {
    $this->_content = json_decode(file_get_contents($this->_path_to_file), true);
    return $this->_content;
  }

  public function value($key = null) {
    $temp = $this->content();

    if ($key != null) {
      return $temp[$key];
    } else {
      return $temp[$this->_json_key];
    }
  }

  public function writeJsonData($json_data) {
    return file_put_contents($this->_path_to_file, $json_data);
  }

  public function writeNumber($number) {
    $temp = json_encode([$this->_json_key => $number]);
    return $this->writeJsonData($temp);
  }

}
?>
