<?php

require_once 'repository.php';
require_once 'model.php';

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


    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!($this->repo->count("SELECT COUNT(id) FROM leads WHERE email = '$email'"))) {
      $this->repo->query(
        'INSERT INTO leads ' .
          '(name, email) VALUES' .
          "('$name', '$email')"
      );
    }

    return unserialize($name);
  }

  function getLeads(string $search)
  {
    $query = "SELECT * FROM leads WHERE email LIKE '%$search%'";
    try {
      $ret = $this->repo->query($query);

      return [$ret, $query, ''];
    } catch (Exception $e) {
      return [[], $query, $e->getMessage()];
    }
  }
}
