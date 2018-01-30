<?php
class SmiirlApi {

  protected $_app;

  public function __construct($app = null) {
    $this->_app = ( $app ?? die("App instance not linked to SmiirlApiPage instance") );
    $this->initSmiirlApiPage();
  }

  public function initSmiirlApiPage() {
    header('Content-type: application/json; charset=utf-8');
    $reel_content = $this->_app->getJsonFileContent();
    $reel_key = array_keys($reel_content)[0];
    echo json_encode([$reel_key => $reel_content[$this->_app->getJsonKey()]]);
  }
}
?>
