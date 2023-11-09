<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/Imagen1.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.7); /* Fondo de la tabla con opacidad */
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
    background-color: #61C957;
    color: #000; /* Cambiar el color del texto a negro */
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin: 5px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold; /* Aplicar negrita */
    transition: background-color 0.3s;
}

        select {
            padding: 8px;
        }

        header {
            background-color: #d9f7d6; /* Fondo verde claro para el encabezado */
            color: #333;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <h1>Inventory Management</h1>
        <p><a href="logout.php">Log Out</a></p>
    </header>
<br><br>
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
         <a href="home.php" class="action-button">Back to Home</a>
    </form>

    <table>
        <tr>
            <th>Devices</th>
            <th>Total Qty</th>
        </tr>
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

            // Realiza la inserción en la tabla principal
            $sqlInsert = "INSERT INTO DeviceInventory (device, quantity, city)
            VALUES (:device, :quantity, 'City Name')
            ON DUPLICATE KEY UPDATE quantity = quantity + :quantity";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bindParam(":device", $device);
            $stmtInsert->bindParam(":quantity", $quantity);

            // Ejecuta la inserción en la tabla principal
            try {
                $stmtInsert->execute();
                echo "Product added successfully.";
            } catch (PDOException $e) {
                echo "Error adding the product: " . $e->getMessage();
            }
        }

        // Consulta para obtener los datos de la vista ViewInventory
        $sql = "SELECT device, quantity FROM DeviceInventory";
        $result = $conn->query($sql);

        if ($result) {
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['device'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No data found.";
        }
        $conn = null;
        ?>
    </table>
</body>
</html>
