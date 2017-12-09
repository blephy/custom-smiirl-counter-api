<?php
class Log {

  protected $_app;
  protected $_content;

  public function __construct($app = null) {
    if ($app != null) {
      $this->_app = $app;
    } else {
      die("App instance not linked to Log instance");
    }
  }

  public function isLogExist() {
    return file_exists($this->_app->getLogFilePath());
  }

  public function initLog() {
    $parts = explode('/', $this->_app->getJsonFilePath());
    $file = array_pop($parts);
    $dir = '';
    foreach($parts as $part) {
      if(!is_dir($dir .= "/$part")) mkdir($dir);
    }
    return file_put_contents($this->_app->getLogFilePath(), '', LOCK_EX);
  }

  public function write($number) {
    if (!$this->isLogExist()) {
      $this->initLog();
    }
    $date = date("d/m/Y G:i:s");
    $new_line = "\r\n";
    $ip = $_SERVER['REMOTE_ADDR'];
    $action = $_POST[RADIO_PARAMS];
    $input = $_POST[$this->_app->getJsonKey()];
    $log = PREFIX.DATE_LOG.SUFFIX.$date.
           INTERFIX.IP_LOG.SUFFIX.$ip.
           INTERFIX.NUMBER_LOG.SUFFIX.$number.
           INTERFIX.ACTION_LOG.SUFFIX.$action.
           INTERFIX.INPUT_LOG.SUFFIX.$input.
           $new_line;
    return file_put_contents($this->_app->getLogFilePath(), $this->_content.$log, FILE_APPEND | LOCK_EX);
  }

  public function content() {
    if (!$this->isLogExist()) {
      $this->initLog();
    }
    $this->_content = file_get_contents($this->_app->getLogFilePath());
    return $this->_content;
  }

  public function getLast($how_many) {
    if ($how_many != null) {
      $temp = array_reverse(preg_split("/".PREFIX."/", $this->content()));
      return array_slice($temp, 0, $how_many);
    } else {
      return array_reverse(preg_split("/".PREFIX."/", $this->content()));
    }
  }

  public function getLogInfo($line, $search) {
      $temp = $line;
      $pos_number = strpos($temp, $search);
      $temp = substr($temp, $pos_number + strlen($search));
      $pos_end = strpos($temp, INTERFIX);
      if ($pos_end) {
        return substr($temp, 0, $pos_end);
      } else {
        return $temp;
      }
  }

  public function printLast($how_many, $title) {
    $last_logs = array_filter($this->getLast($how_many));
    if (!empty($last_logs)) {
      echo '<span class="log title"><strong>'.$title.'</strong></span>';
      foreach ($last_logs as $log_line) {
        $number = $this->getLogInfo($log_line, NUMBER_LOG);
        $date = $this->getLogInfo($log_line, DATE_LOG);
        $ip = $this->getLogInfo($log_line, IP_LOG);
        $action = $this->getLogInfo($log_line, ACTION_LOG);
        $input = $this->getLogInfo($log_line, INPUT_LOG);
        if ($number != null && $date != null && $action != null && $input != null && $ip != null) {
            echo '<span class="log">'.$date.'</span>';
            echo '<span class="log line">Action : '.$action.'<br>Entrée : '.$input.' => Résultat : '.$number.'<br>IP : '.$ip.'</span>';
        }
      }
    }
  }
}
?>
