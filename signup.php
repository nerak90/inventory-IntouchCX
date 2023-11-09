<?php
require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // Verificar si el correo electrónico ya está registrado
        $checkEmail = $conn->prepare('SELECT id FROM users WHERE email = :email');
        $checkEmail->bindParam(':email', $_POST['email']);
        $checkEmail->execute();

        if ($checkEmail->rowCount() == 0) {
            // El correo electrónico no está registrado, se puede insertar
            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                $message = 'Successfully created a new user';
            } else {
                $message = 'Sorry, there must have been an issue creating your account';
            }
        } else {
            $message = 'This email is already registered. Please try with another email.';
        }
    } else {
        $message = 'Please fill in all fields';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .message {
            color: #4CAF50; /* Color de mensaje de éxito (verde) */
            font-weight: bold;
        }

        .error-message {
            color: #000; /* Color de mensaje de error (negro) */
            font-weight: bold;
            text-decoration: underline; /* Subraya el mensaje de error */
            text-decoration-color: #000; /* Color de subrayado (negro) */
        }

        h1 {
            font-size: 24px;
            color: #333; /* Color de título */
        }

        a {
            color: #4CAF50; /* Color de enlace (verde) */
            text-decoration: none;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            margin-top: 50px; /* Mover el formulario hacia abajo */
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin: 10px 0; /* Espacio entre los campos de texto */
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Cambia el color del botón a verde */
            color: #fff; /* Color del texto del botón (blanco) */
            border: none;
            padding: 15px 30px; /* Aumenta el tamaño del botón */
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php if (!empty($message)): ?>
    <p class="error-message"><?= $message ?></p>
<?php endif; ?>

<h1><span style="font-size: 30px; font-weight: bold;">Sign Up</span></h1>

<a href="login.php">
    <button style="background-color: #4CAF50; color: #fff; border: none; padding: 15px 30px; border-radius: 10px; font-weight: bold; cursor: pointer;">
        Login
    </button>
</a>

<form action="signup.php" method="POST">
    <input name="email" type="text" placeholder="Enter your email">
    <input name="password" type="password" placeholder="Enter your Password">
    <input name="confirm_password" type="password" placeholder="Confirm Password">
    <input type="submit" value="Submit">
</form>
</body>
</html>
