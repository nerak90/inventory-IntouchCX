<?php
  session_start();

  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: home.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
      body {
        background-image: url('images/tran.jpg'); /* Cambia la URL de la imagen de fondo */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      h1 {
        font-size: 24px;
        color: #333; /* Color de título */
      }

      a {
        color: #4CAF50; /* Color de enlace (verde) */
        text-decoration: none;
      }

      <?php if(!empty($message)): ?>
      .error-message {
        color: #f00; /* Color de mensaje de error (rojo) */
        font-weight: bold;
      <?php endif; ?>
    </style>
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p class="error-message"><?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
