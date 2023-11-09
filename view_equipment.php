<!DOCTYPE html>
<html>
<head>
    <title>Equipment Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/Imagen1.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Ajusta el tamaño de la imagen para cubrir todo el fondo */
            background-repeat: no-repeat; /* Evita que la imagen de fondo se repita */
        }

        /* Estilos para el contenido de la página */
        h1 {
    text-align: center;
    color: #333;
    background-color: rgba(143, 188, 139, 0.8); /* Fondo verde claro y semitransparente para el encabezado */
    padding: 10px;
}
h1::before { /* Pseudo-elemento ::before para el icono */
            content: ""; /* Obligatorio para que el contenido sea un elemento */
            background-image: url('images/logo_sin_fondo.png'); /* Ruta de tu icono */
            background-size: 24px; /* Ajusta el tamaño de tu icono */
            width: 24px; /* Ancho de tu icono */
            height: 24px; /* Alto de tu icono */
            position: absolute; /* Posición absoluta para superponer el icono al texto */
            left: -30px; /* Espacio a la izquierda del texto */
            top: 50%; /* Lo centra verticalmente */
            transform: translateY(-50%); /* Alinea verticalmente el icono */
        }
        /* Resto de estilos aquí... */
        table {
            border-collapse: collapse;
            width: 80%;
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
        .button-container {
    text-align: center;
}

/* Estilos para los botones */
.button-container input[type="submit"] {
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

.button-container .button {
    display: inline-block;
    width: 48%;
}

label[for="search_term"] {
    font-weight: bold;
}


    </style>
</head>
<body>
    <h1>Equipment Information</h1>

    <form action="view_equipment.php" method="post">
        <label for="search_term">Search Equipment:</label>
        <input type="text" id="search_term" name="search_term" required>
        <input type="submit" value="Search">
    </form>

    <div class="button-container">
        <!-- Agrega los botones de "Eliminar Equipo" y "Agregar Equipo" -->
        <form action="delete_equipment.php" method="post">
            <input type="submit" name="delete_equipment" value="Delete Equipment">
        </form>

        <form action="add_equipment.php" method="post">
            <input type="submit" name="add_equipment" value="Add Equipment">
        </form>

        <form action="home.php" method="get">
    <input type="submit" value="Back to Home">
</form>

</form>

    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_term = $_POST["search_term"];
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $database = "inventoryintouch";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query to get equipment-related information
            $sql = "SELECT 
                E.workstation AS EquipmentName, 
                C.cityName AS City, 
                E.serviceTag, 
                E.campaign,
                E.size, -- Campo de tamaño de la CPU
                S.size AS ScreenSize, 
                S.screenBrand AS ScreenBrand,
                A.keyboards AS Keyboards, 
                A.mice AS Mice, 
                A.networkCables AS NetworkCables, 
                A.videoCables AS VideoCables,
                A.displayAdapterQuantity AS DisplayAdapters, 
                A.cpuAdapterQuantity AS CPUAdapters, 
                A.powerCables AS PowerCables, 
                A.observations AS Observations
            FROM Equipment E
            LEFT JOIN Cities C ON E.cityId = C.idCity
            LEFT JOIN Screens S ON E.idEquipment = S.idScreen
            LEFT JOIN Accessories A ON E.idEquipment = A.idAccessories
            WHERE E.workstation = :search_term";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":search_term", $search_term);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<table>";
                echo "<tr><th>Equipment Name</th><th>City</th><th>Service Tag</th><th>Campaign</th><th>CPU Size</th><th>Screen Size</th><th>Keyboards</th><th>Mice</th><th>Network Cables</th><th>Video Cables</th><th>Display Adapters</th><th>CPU Adapters</th><th>Power Cables</th><th>Observations</th></tr>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['EquipmentName'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['serviceTag'] . "</td>";
                    echo "<td>" . $row['campaign'] . "</td>";
                    echo "<td>" . $row['size'] . "</td>";
                    echo "<td>" . $row['ScreenSize'] . "</td>";
                    echo "<td>" . $row['Keyboards'] . "</td>";
                    echo "<td>" . $row['Mice'] . "</td>";
                    echo "<td>" . $row['NetworkCables'] . "</td>";
                    echo "<td>" . $row['VideoCables'] . "</td>";
                    echo "<td>" . $row['DisplayAdapters'] . "</td>";
                    echo "<td>" . $row['CPUAdapters'] . "</td>";
                    echo "<td>" . $row['PowerCables'] . "</td>";
                    echo "<td>" . $row['Observations'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Equipment not found.";
            }

            $conn = null;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
