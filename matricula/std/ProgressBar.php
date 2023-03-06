<?php
class ProgressBar {

  private $sProgressBar;

  /**
   * @param string sProgressBar Nome da instância do componente de tela.
   */
  public function __construct($sProgressBar) {
    $this->sProgressBar = $sProgressBar;
  }

  public function updateMaxProgress($iMax) {

    echo "<script type=\"text/javascript\">{$this->sProgressBar}.getBar().max = '$iMax';</script>";
    $this->flush();
  }

  public function updatePercentual($iAtual) {

    echo "<script type=\"text/javascript\">{$this->sProgressBar}.updateProgress('$iAtual');</script>";
    $this->flush();
  }

  public function setMessageLog($sMessage) {

    echo "<script type=\"text/javascript\">{$this->sProgressBar}.logMessage('$sMessage');</script>";
    $this->flush();
  }

  public function flush() {

    echo str_repeat(' ', 1024 * 64);
    flush();
  }
}
