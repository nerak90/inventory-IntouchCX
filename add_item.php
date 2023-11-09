<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        select {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Inventory Management</h1>

    <form action="agregar_producto.php" method="post">
        <label for="device">Device:</label>
        <select id="device" name="device" required>
            <option value="Patch cords (5m)">Patch cords (5m)</option>
            <option value="Power cables">Power cables</option>
            <option value="CPU adapters">CPU adapters</option>
            <option value="Monitor adapters">Monitor adapters</option>
            <option value="Monitors">Monitors</option>
            <option value="CPUs">CPUs</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Mouse">Mouse</option>
            <option value="DP cables">DP cables</option>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "inventoryintouch";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device = $_POST["device"];
    $quantity = $_POST["quantity"];

    // Validar y procesar los datos según sea necesario antes de actualizar la base de datos

    // Actualizar la base de datos con la nueva cantidad o producto
    $sql = "INSERT INTO DeviceQuantity (device, quantity) VALUES (:device, :quantity)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":device", $device);
    $stmt->bindParam(":quantity", $quantity);

    try {
        $stmt->execute();
        echo "Product added successfully.";
    } catch (PDOException $e) {
        echo "Error adding the product: " . $e->getMessage();
    }
}

$conn = null;
?>
