<?php
require_once 'controller.php';

$controller = new Controller();
$ret = $controller->addLead();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>

<body>
  <h1>Welcome</h1>
  <p>Thanks for your registration. Follow up using the provided email</p>
  <p>Nome: <?php echo $_POST['name'] ?></p>
  <p>Email: <?php echo $_POST['email'] ?></p>

</body>

</html>