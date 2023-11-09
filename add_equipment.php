<!DOCTYPE html>
<html>
<head>
    <title>Add Equipment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 4px; /* Reducir el tamaño del texto */
            box-sizing: border-box; /* Evitar que el padding afecte el tamaño total */
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
    <h1>Add Equipment</h1>

    <form action="process_add_equipment.php" method="post">
        <label for="equipmentName">Equipment Name:</label>
        <input type="text" id="equipmentName" name="equipmentName" required>

        <label for="city">City:</label>
        <select id="city" name="city">
            <option value="Cali">Cali</option>
            <option value="Medellin">Medellin</option>
            <option value="Bucaramanga">Bucaramanga</option>
            <option value="Barranquilla">Barranquilla</option>
            <option value="Bogota">Bogota</option>
            <!-- Agrega más opciones de ciudad si es necesario -->
        </select>

        <label for="serviceTag">Service Tag:</label>
        <input type="text" id="serviceTag" name "serviceTag" required>

        <label for="campaign">Campaign:</label>
        <input type="text" id="campaign" name="campaign">

        <label for="cpuSize">CPU Size:</label>
        <input type="text" id="cpuSize" name="cpuSize">

        <label for="screenSize">Screen Size:</label>
        <input type="text" id="screenSize" name="screenSize">

        <label for="keyboards">Keyboards:</label>
        <input type="text" id="keyboards" name="keyboards">

        <label for="mice">Mice:</label>
        <input type="text" id="mice" name="mice">

        <label for="networkCables">Network Cables:</label>
        <input type="text" id="networkCables" name="networkCables">

        <label for="videoCables">Video Cables:</label>
        <input type="text" id="videoCables" name="videoCables">

        <label for="displayAdapters">Display Adapters:</label>
        <input type="text" id="displayAdapters" name="displayAdapters">

        <label for="cpuAdapters">CPU Adapters:</label>
        <input type="text" id="cpuAdapters" name="cpuAdapters">

        <label for="powerCables">Power Cables:</label>
        <input type="text" id="powerCables" name="powerCables">

        <label for="observations">Observations:</label>
        <input type="text" id="observations" name="observations">
 <br><br>
        <input type="submit" value="Add Equipment">
    </form>
</body>
</html>
