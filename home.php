<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory System - Home</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-image: url('images/Imagen4.jpg'); /* Ruta de la imagen de fondo */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    color: #00FF00;
}


        header {
            background-color: #fff;
            color: #000;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 36px;
            margin: 0;
            color: #000;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            font-size: 24px;
            margin-top: 0;
            color: #000;
        }

        .container p {
            font-size: 18px;
            color: #000;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .inventory-actions {
            margin-top: 20px;
        }

        .action-button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Inventory System</h1>
        <p><a href="logout.php">Log Out</a></p>
    </header>

    <div class="container">
        <h2>Board</h2>
        <p>Welcome to the system, choose what you want to do with the city's equipment</p>

        <div class="inventory-actions">
            <a href="view_equipment.php" class="action-button">View Equipment</a>
            <a href="add_item.php" class="action-button">Inventory</a>
            <a href="assembly.php" class="action-button">Equipment Assembly</a>
            <a href="instructions.php" class="action-button">Instructions</a>
        </div>
    </div>
</body>
</html>
