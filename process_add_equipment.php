<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentName = $_POST["equipmentName"];
    $cityId = $_POST["City"];
    $campaign = $_POST["campaign"];
    $size = $_POST["cpuSize"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "inventoryintouch";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertar el nuevo equipo en la base de datos
        $sql = "INSERT INTO Equipment (workstation, cityId, campaign, size) VALUES (:equipmentName, :cityId, :campaign, :size)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":equipmentName", $equipmentName);
        $stmt->bindParam(":cityId", $cityId);
        $stmt->bindParam(":campaign", $campaign);
        $stmt->bindParam(":size", $size);
        $stmt->execute();

        echo "Equipment added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
