<?php
class Log {

  private $_path_to_file;

  public function __construct($path_to_file = null) {
    global $_ROOT_FOLDER, $_PATH_LOG_FILE;

    if ($path_to_file != null) {
      $this->_path_to_file = $path_to_file;
    } else {
      $this->_path_to_file = $_ROOT_FOLDER.$_PATH_LOG_FILE;
    }
  }

  public function write($number) {
    $date = date("d/m/Y G:i:s");
    $new_line = " \r\n";
    $ip = "IP: ".$_SERVER['REMOTE_ADDR'];
    $log = $date."      ----->      ".$ip."      :      ".$number.$new_line;
    error_log($log, 3, $this->_path_to_file);
  }
}
?>
