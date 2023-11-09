<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Instructions</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('images/Imagen4.jpg'); /* Background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #000;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Transparent black background */
            color: #fff; /* White text */
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #fff; /* White text */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 1); /* Transparent black background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: #fff; /* White text */
        }

        h2 {
            font-size: 24px;
            margin-top: 0;
        }

        p {
            font-size: 18px;
            line-height: 1.0; /* Line spacing of 1.5 */
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .instructions {
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Instructions</h1>
        <p><a href="logout.php">Log Out</a></p>
    </header>

    <div class="container">
        <h2>How to Use the System</h2>
        <div class="instructions">
            <ol style="line-height: 1.5;">
    <li><strong>Log into the system:</strong> Sign in if you already have an account or register if you are new to the system.</li>
    <li><strong>Home:</strong> After logging in, access the main menu and choose one of the following options:
        <ul>
            <li><strong>View equipment:</strong> Here, you can search for equipment accessories, campaigns, and cities by workstation. You can also add or remove equipment.</li>
            <li><strong>City inventory:</strong> In this section, you will find accessories used in different cities. You can view the name of the device or accessory and the quantity available. You can also add or remove them.</li>
            <li><strong>Assembling equipment in cities:</strong> Each box represents a campaign. By clicking, you can access step-by-step instructions and learn about the necessary programs or applications for each campaign.</li>
        </ul>
    </li>
    <li><strong>Instructions:</strong> This section provides detailed information on how to use the system.</li>
    <li><strong>Log out:</strong> When you're finished, select the "Logout" option to exit the system.</li>
</ol>
<p><em>Created by: Karen Tapias Sossa</em></p>
<img src="images/mujer.png" alt="Icon">
        </div>
    </div>
</body>
</html>
