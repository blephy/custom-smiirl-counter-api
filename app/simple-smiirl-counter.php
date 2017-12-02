<?php
include_once 'config/actions-type.php';
include_once 'config/logs-type.php';
include_once 'config/params-type.php';
include_once 'config/client.php';
include_once 'class/class.file.php';
include_once 'class/class.log.php';
include_once 'class/class.smiirlapi.php';
include_once 'class/class.postlistener.php';
include_once 'class/class.actionradio.php';

class SimpleSmiirlCounter {

  // Available upon instantiation
  protected $_path_to_json_file;
  protected $_path_to_log_file;

  protected $_json_key;
  protected $_actions;
  protected $_default_input_value;
  protected $_default_title_log;

  // Available at the end of the instantiation
  protected $_file_instance;
  protected $_log_instance;
  protected $_actionradios_instance;

  // Available after calling a specific method
  protected $_post_listener_instance;
  protected $_smiirlapi_instance;
  protected $_counter_value;

  // Instantiation function
  public function __construct($path_to_json_file = null,
                              $path_to_log_file = null,
                              $json_key = null,
                              $actions = null,
                              $default_input_value = null,
                              $default_title_log = null) {
    global $_APP_FOLDER,
           $_PATH_JSON_FILE,
           $_PATH_LOG_FILE,
           $_KEY_NAME,
           $_ACTIONS,
           $_DEFAULT_INPUT_VALUE,
           $_DEFAULT_TITLE_LOG;

    if ($path_to_json_file != null) {
      $this->_path_to_json_file = $path_to_json_file;
    } else {
      $this->_path_to_json_file = $_APP_FOLDER.$_PATH_JSON_FILE;
    }
    if ($path_to_log_file != null) {
      $this->_path_to_log_file = $path_to_log_file;
    } else {
      $this->_path_to_log_file = $_APP_FOLDER.$_PATH_LOG_FILE;
    }
    if ($json_key != null) {
      $this->_json_key = $json_key;
    } else {
      $this->_json_key = $_KEY_NAME;
    }
    if ($actions != null) {
      $this->_actions = $actions;
    } else {
      $this->_actions = $_ACTIONS;
    }
    if ($default_input_value != null) {
      $this->_default_input_value = $default_input_value;
    } else {
      $this->_default_input_value = $_DEFAULT_INPUT_VALUE;
    }
    if ($default_title_log != null) {
      $this->_default_title_log = $default_title_log;
    } else {
      $this->_default_title_log = $_DEFAULT_TITLE_LOG;
    }

    $this->_file_instance = new File($this);
    $this->_log_instance = new Log($this);
    $this->_actionradios_instance = new ActionRadios($this);
  }

  public function initEditPage() {
    $this->_post_listener_instance = new PostListener($this);
  }

  public function initSmiirlApiPage() {
    $this->_smiirlapi_instance = new SmiirlApi($this);
  }

  public function getJsonFilePath() {
    return $this->_path_to_json_file;
  }

  public function getLogFilePath() {
    return $this->_path_to_log_file;
  }

  public function getJsonFileContent() {
    return $this->_file_instance->content();
  }

  public function getJsonKey() {
    return $this->_json_key;
  }

  public function getFileInstance() {
    return $this->_file_instance;
  }

  public function getLogInstance() {
    return $this->_log_instance;
  }

  public function getActionRadiosInstance() {
    return $this->_actionradios_instance;
  }

  public function getActions() {
    return $this->_actions;
  }

  public function getFirstAction() {
    return reset($this->_actions);
  }

  public function printActionsRadios() {
    return $this->getActionRadiosInstance()->printHtmlRadios($this->getActions());
  }

  public function printLastLog($max = null, $title = null) {
    if ($max != null && $title != null) {
      return $this->getLogInstance()->printLast($max, $title);
    } else {
      return $this->getLogInstance()->printLast(5, $this->_default_title_log);
    }
  }

  public function getCounterValue() {
    $this->_counter_value = $this->_file_instance->value();
    return $this->_counter_value;
  }

  public function getDefaultInputValue() {
    return $this->_default_input_value;
  }
}
?>
