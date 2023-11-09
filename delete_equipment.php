<!DOCTYPE html>
<html>
<head>
    <title>Delete Equipment</title>
</head>
<body>
    <h1>Delete Equipment</h1>

    <form action="process_delete_equipment.php" method="post">
        <label for="equipmentId">Equipment ID:</label>
        <input type="text" id="equipmentId" name="equipmentId" required>

        <input type="submit" value="Delete Equipment">
    </form>
</body>
</html>
