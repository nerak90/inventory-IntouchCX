<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentId = $_POST["equipmentId"];

    // Conexión a la base de datos (de nuevo)
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "inventoryintouch";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Eliminar el equipo de la base de datos
        $sql = "DELETE FROM Equipment WHERE idEquipment = :equipmentId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":equipmentId", $equipmentId);
        $stmt->execute();

        echo "Equipment deleted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
