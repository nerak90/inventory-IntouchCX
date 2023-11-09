<!DOCTYPE html>
<html>
<head>
    <title>Levi's Campaign Instructions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/Imagen1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #FF6B6B;
            text-align: center;
            padding: 20px 0;
        }

        header img {
            max-width: 80px; /* Ajusta el tamaño del logo */
        }

        h1 {
            color: #333;
        }

        .instructions {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 800px;
            margin: 20px auto;
        }

        h2 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        p {
            color: #666;
            font-size: 1rem;
        }

        .action-button {
            padding: 10px 20px;
            background-color: #fff; /* Color blanco */
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .action-button:hover {
            background-color: #fff; /* Color blanco en el hover */
        }
    </style>
</head>
<body>
    <header>
        <img src="images/levis.png" alt="Levi's Logo">
        <h1>Levi's Campaign Instructions</h1>
        <p><a href="home.php" class="action-button">Back to Home</a></p>
        <p><a href="assembly.php" class="action-button">Back to campaigns</a></p>
    </header>

    <div class="instructions">
        <h2>Instructions for Levi's Campaign</h2>
        <ol>
            <li>Format the computer you will use.</li>
            <li>Connect the computer to the deployment area.</li>
            <li>Provide the service tag of the computer for naming (e.g., BGA1-WFH-0989) or use an existing name.</li>
            <li>Join the domain by opening "This PC" using the Windows key and selecting "Rename advanced." Change the computer name, use the domain name (e.g., intouchcxpci.local), and restart the computer to apply the changes.</li>
            <li>After logging in, press the Windows key + Control Panel to check which programs are installed. If you find that some programs are incomplete or missing, follow these steps:
                <ul>
                    <li>Press the Windows key to open the Start menu.</li>
                    <li>Type "CMD" to search for the Command Prompt.</li>
                    <li>Right-click on Command Prompt and select "Run as administrator."</li>
                    <li>In the Command Prompt window, enter the following commands:
                        <code>sfc/scannow</code> y 
                        <code>gpupdate/force</code>
                    </li>
                    <li>These commands will help verify and repair potential issues in the system and force the update of group policies. Make sure to run these commands as an administrator.</li>
                </ul>
            </li>
            <li>If the second screen doesn't turn on, download the required drivers based on the computer model.</li>
            <li>If programs don't download, look in the "temp" directory or the Task Scheduler to run the required task.</li>
            <li>After completing the setup, press the Windows key and search for "Control Panel." Verify that all campaign programs are installed. Once they are complete, power off the computer and disconnect it.</li>
        </ol>
       
        <div class="programs">
            <h2>Levi's Programs</h2>
            <img src="images/levispro.jpg" alt="Levi's Programs" style="max-width: 100%;">
        </div>
    </div>
</body>
</html>
