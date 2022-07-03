<?php
class Repository
{
  private string $dbhost = 'localhost';
  private string $dbuser = 'admin';
  private string $dbpass = 'senhamuitoforte123';
  private string $dbname = 'store';
  private mysqli $conn;

  private static Repository $instance = null;

  static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new Repository();
    }

    return self::$instance;
  }

  function __construct()
  {
    $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    if ($this->conn->connect_errno) {
      printf("Connect failed: %s<br />", $this->conn->connect_error);
      exit();
    }
  }

  function query(string $query)
  {
    $retval = $this->conn->query($query);
    if (!$retval) {
      die('Failed to query data: ' . mysqli_error(($this->conn)));
    }
  }

  function __destruct()
  {
    $this->conn->close();
  }
}
