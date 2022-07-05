<?php
class Repository
{
  private string $dbhost = 'database';
  private string $dbuser = 'admin';
  private string $dbpass = 'senhamuitoforte123';
  private string $dbname = 'store';
  private mysqli $conn;

  private static ?Repository $instance = null;

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

    $this->conn->query("CREATE TABLE IF NOT EXISTS leads (id INT NOT NULL AUTO_INCREMENT, name VARCHAR(255), email VARCHAR(255), PRIMARY KEY (id))");
  }

  function count(string $query)
  {
    $ret = $this->conn->query($query);
    $column = $ret->fetch_column(0);
    $ret->close();

    return (int)$column;
  }

  function query(string $query)
  {
    $retval = $this->conn->multi_query($query);
    if (!$retval) {
      die('Failed to query data: ' . mysqli_error(($this->conn)));
    }

    return $this->conn->store_result();
  }

  function getRows(mysqli_result $ret)
  {
    return mysqli_fetch_array($ret);
  }

  function __destruct()
  {
    $this->conn->close();
  }
}
