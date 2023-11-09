<?php
session_start();
require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $user = $records->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Se encontró un usuario
    // Puedes mostrar su información aquí
  } else {
    $errorMessage = "El usuario no existe.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory Cities IntouchCX </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<style>
    body {
        background-image: url('images/Imagen4.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .container {
        text-align: center;
        margin: 0;
        padding: 0;
        color: #ffffff;
        background: none;
    }

    .container h1 {
        font-size: 24px;
    }

    .container a {
        color: #ffffff;
        text-decoration: none;
        display: inline-block;
        background-color: #4CAF50; /* Color verde */
        padding: 10px 20px;
        border-radius: 5px;
        margin: 10px;
    }
</style>
<?php require 'partials/header.php' ?>

<?php if(!empty($user)): ?>
    <br> Welcome. <?= $user['email']; ?>
    <br>You are Successfully Logged In
    <a href="logout.php">
        Logout
    </a>
<?php elseif(!empty($errorMessage)): ?>
    <h1><?= $errorMessage ?></h1>
    <a href="login.php">Login</a> or
    <a href="signup.php">Sign Up</a>
<?php else: ?>
    <h1>Please Login or Sign Up</h1>
    <a href="login.php">Login</a> or
    <a href="signup.php">Sign Up</a>
<?php endif; ?>
</body>
</html>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inventory Cities IntouchCX </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  <style>
      body {
        background-image: url('images/Imagen4.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        text-align: center;
      }

      .container {
        text-align: center;
        margin: 0;
        padding: 0;
        color: #ffffff;
        background: none;
      }

      .container h1 {
        font-size: 24px;
      }

      .container a {
        color: #ffffff;
        text-decoration: none;
        display: inline-block;
        background-color: #4CAF50; /* Color verde */
        padding: 10px 20px;
        border-radius: 5px;
        margin: 10px;
      }
    </style>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Please Login or Sign Up</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">Sign Up</a>
    <?php endif; ?>
  </body>
</html>
