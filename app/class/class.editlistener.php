<?php
class EditListener {

  protected $_app;
  protected $_max_number;

  public function __construct($app = null) {
    if ($app != null) {
      $this->_app = $app;
      $this->initEditPage();
    } else {
      die("App instance not linked to PostListener instance");
    }
  }

  public function initEditPage() {
    header('Content-type: text/html; charset=utf-8');
    $reel_content = $this->_app->getFileInstance()->content();

    if ($_POST) {
      if ( $_POST[RADIO_PARAMS] && $_POST[$this->_app->getJsonKey()] >= 0) {
        if ( in_array($_POST[RADIO_PARAMS], array_keys($this->_app->getActions())) ) {
          $math = $this->_app->getActions()[$_POST[RADIO_PARAMS]][MATH];
          $result = $this->returnUnderMaxNumber(
                      $this->returnOnlyInt(
                        $this->returnOnlyPositiv(
                          $math(
                            $reel_content[$this->_app->getJsonKey()],
                            $_POST[$this->_app->getJsonKey()]
                            )
                          )
                        )
                      );
          $this->_app->getFileInstance()->writeNumber($result);
          $this->_app->getLogInstance()->write($result);
        }
      }
    }
  }

  public function returnOnlyInt($number) {
    return intval($number);
  }

  public function calculeMaxNumber() {
    $_config_max_digit = $this->_app->getMaxDigitCounter();
    $temp = null;
    for ($i = $_config_max_digit - 1; $i >= 1; $i--) {
      $temp += pow(10, $i) * 9;
    }
    $temp += 9;
    return $temp;
  }

  public function returnUnderMaxNumber($number) {
    $temp = $this->calculeMaxNumber();
    return $number > $temp ? $temp : $number;
  }

  public function returnOnlyPositiv($number) {
    if ($number >= 0) {
      return abs($number);
    } else {
      return 0;
    }
  }
}
?>
