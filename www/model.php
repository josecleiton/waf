<?php
class Model
{
  public $file;
  function __destruct()
  {
    $file = "/tmp/$this->file";
    if (is_file($file)) {
      unlink($file);
    }
  }
}
