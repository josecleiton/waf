<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bad Search</title>
</head>

<body>
  <div>
    <?php
    require_once 'controller.php';

    $controller = new Controller();
    $search = $_GET['search'];

    echo "<p> <strong>Input</strong>: " . $search . "</p>";

    $result = $controller->getLeads($search);
    echo "<p> <strong>Query</strong>: " . $result[1] .  "</p>";
    if ($result[2]) {
      echo "<p> <strong>Error</strong>: " . $result[2] . "</p>";
    }
    foreach ($result[0] as $r) {
      printf("<div>%u %s - %s</div>", $r["id"], $r["name"], $r["email"]);
    }
    ?>
  </div>

</body>

</html>