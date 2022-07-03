<?php

require_once('./conn.php');

class Controller
{
  private Repository $repo;

  function __construct()
  {
    $this->repo = Repository::getInstance();
  }

  function addLead()
  {
    if (!(isset($_POST['name']) && isset($_POST['email']))) {
      die("name and email are required");
    }

    if (preg_match("/[^A-Za-z'-]/", $_POST['name'])) {
      die("invalid name and name should be alpha");
    }

    $name = $_POST['name'];
    $email = $_POST['email'];

    $ret = $this->repo->query(
      'INSERT INTO leads ' .
        '(name, email) VALUES' .
        "($name, $email)"
    );
  }
}
