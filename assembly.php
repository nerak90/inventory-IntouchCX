<!DOCTYPE html>
<html>
<head>
    <title>Equipment Assembly</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/Imagen1.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #d9f7d6; /* Fondo verde claro para el encabezado */
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            color: #333;
        }

        .campaigns {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .campaign {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .campaign img {
            max-width: 100%;
            max-height: 150px; /* Maximum height for all images */
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .campaign h2 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .campaign p {
            color: #666;
            font-size: 1rem;
        }

        .action-button {
            padding: 10px 20px;
            background-color: #61C957;
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
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <header>
        <h1>Equipment Assembly</h1>
        <p><a href="home.php" class="action-button">Back to Home</a></p>
        <p><a href="logout.php" class="action-button">Logout</a></p>
    </header>

    <div class="campaigns">
    <div class="campaign">
    <a href="walmart.php">
        <img src="images/walmart.png" alt="Walmart Campaign">
        <h2>Walmart</h2>
        <p>Detailed explanation of the Walmart campaign.</p>
    </a>
</div>

<div class="campaign">
    <a href="booking.php">
        <img src="images/booking.png" alt="Booking Campaign">
        <h2>Booking</h2>
        <p>Detailed explanation of the Booking campaign.</p>
    </a>
</div>

        <div class="campaign">
        <a href="redrobbin.php">
            <img src="images/redR.png" alt="Red Robin Campaign">
            <h2>Red Robin</h2>
            <p>Detailed explanation of the Red Robin campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="levis.php">
            <img src="images/levis.jpg" alt="Levi's Campaign">
            <h2>Levi's</h2>
            <p>Detailed explanation of the Levi's campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="loreal.php">
            <img src="images/loreal-logo.jpg" alt="L'Oreal Campaign">
            <h2>L'Oreal</h2>
            <p>Detailed explanation of the L'Oreal campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="mejuri.php">
            <img src="images/mejuri.png" alt="Mejuri Campaign">
            <h2>Mejuri</h2>
            <p>Detailed explanation of the Mejuri campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="vroom.php">
            <img src="images/vroom.png" alt="Vroom Campaign">
            <h2>Vroom</h2>
            <p>Detailed explanation of the Vroom campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="weber.php">
            <img src="images/weberlogo.png" alt="Weber Campaign">
            <h2>Weber</h2>
            <p>Detailed explanation of the Weber campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="optavia.php">
            <img src="images/optavia.jpg" alt="Optavia Campaign">
            <h2>Optavia</h2>
            <p>Detailed explanation of the Optavia campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="tcp.php">
            <img src="images/tcpl.png" alt="TCP Campaign">
            <h2>TCP</h2>
            <p>Detailed explanation of the TCP campaign.</p>
            </a>
        </div>

        <div class="campaign">
        <a href="gnc.php">
            <img src="images/GNC.png" alt="GNC Campaign">
            <h2>GNC</h2>
            <p>Detailed explanation of the GNC campaign.</p>
            </a>
        </div>
</body>
</html>
