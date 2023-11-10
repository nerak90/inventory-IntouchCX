<!DOCTYPE html>
<html>
<head>
    <title>Equipment Information</title>
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

        form {
            text-align: center;
        }

        input[type="text"] {
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
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
            E.size AS CPUSize,
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
        LEFT JOIN Screens S ON E.idEquipment = S.equipmentId
        LEFT JOIN Accessories A ON E.idEquipment = A.equipmentId
        WHERE E.workstation = :search_term";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":search_term", $search_term);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<table>";
            echo "<tr><th>Equipment Name</th><th>City</th><th>Service Tag</th><th>Campaign</th><th>Screen Size</th><th>Keyboards</th><th>Mice</th><th>Network Cables</th><th>Video Cables</th><th>Display Adapters</th><th>CPU Adapters</th><th>Power Cables</th><th>Observations</th></tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['EquipmentName'] . "</td>";
                echo "<td>" . $row['City'] . "</td>";
                echo "<td>" . $row['serviceTag'] . "</td>";
                echo "<td>" . $row['campaign'] . "</td>";
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
<div style="text-align: center; margin-top: 20px;">
        <button onclick="location.href='add_equipment.php'">Add equipment</button>
        <button onclick="location.href='delete_equipment.php'">Delete equipment</button>
        <button onclick="location.href='HOME.php'">Back to Home</button>
    </div>

</body>
</html>
