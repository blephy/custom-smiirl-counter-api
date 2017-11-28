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
    global $FILE;

    $date = date("d/m/Y G:i:s");
    $new_line = "\r\n";
    $ip = $_SERVER['REMOTE_ADDR'];
    $action = $_POST['PARAMS'];
    $input = $_POST[$FILE->key()];
    $log = "-->DATE: ".$date.
           " - IP: ".$ip.
           " - NUMBER: ".$number.
           " - ACTION: ".$action.
           " - INPUT: ".$input.
           $new_line;
    return error_log($log, 3, $this->_path_to_file);
  }

  public function erase() {
    return file_put_contents($this->_path_to_file, '');
  }

  public function content() {
    return file_get_contents($this->_path_to_file);
  }

  public function getLast($how_many) {
    if ($how_many != null) {
      $temp = array_reverse(preg_split("/-->/", $this->content()));
      return array_slice($temp, 0, $how_many);
    } else {
      return array_reverse(preg_split("/-->/", $this->content()));
    }
  }

  public function getLogInfo($line, $search) {
      $temp = $line;
      $pos_number = strpos($temp, $search);
      $temp = substr($temp, $pos_number + strlen($search));
      $pos_end = strpos($temp, ' -');
      if ($pos_end) {
        return substr($temp, 0, $pos_end);
      } else {
        return $temp;
      }
  }

  public function printLast($how_many, $title) {
    $last_log = $this->getLast($how_many);
    echo '<span class="log" style="margin-top: 10px;"><strong>'.$title.'</strong></span>';
    foreach ($last_log as $log) {
      $number = $this->getLogInfo($log, 'NUMBER: ');
      $date= $this->getLogInfo($log, 'DATE: ');
      $action = $this->getLogInfo($log, 'ACTION: ');
      $input = $this->getLogInfo($log, 'INPUT: ');
      echo '<span class="log line">'.$date.' -><br>'.$action.' '.$input.' = '.$number.'</span>';
    }
  }
}
?>
