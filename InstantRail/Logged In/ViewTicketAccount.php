<?php
session_start(); // Start session to access logged-in user data

// Include your existing database connection
include "../common/db_connect.php";

// Fetch stations for the dropdown
$sql_stations = "SELECT id_estacion_pk, nombre_estacion FROM estacion WHERE estado = 'Activa'";
$result_stations = $conn->query($sql_stations);

// Generate random ticket ID
$ticket_id = rand(10000000, 99999999);

// Get current date
$current_date = date("Y-m-d");

// Fetch the logged-in user's username from the session
if (isset($_SESSION['nombre_usuario_pk'])) {
    $user_name = $_SESSION['nombre_usuario_pk']; // Use session-stored username
} else {
    $user_name = "Guest"; // Fallback if the user is not logged in
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Ticket</title>

    <!-- W3.CSS stylesheet -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }

        .parallax {
            background-image: url('../images2/train3Background.jpg');
            height: 400px;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        header {
            text-align: center;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
        }

        header h1 {
            font-size: 3rem;
            color: #00bfae;
        }

        .ticket-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border-left: 5px solid #00bfae;
        }

        .ticket-info {
            padding: 20px;
            flex: 1;
        }

        .ticket-info h2 {
            margin-bottom: 10px;
            font-size: 1.8rem;
            color: #333;
        }

        .ticket-info p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        .ticket-qr {
            background-color: #f7f7f7;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-left: 2px dashed #00bfae;
        }

        #qrcode {
            width: 150px;
            height: 150px;
        }
    </style>

    <script>
        window.onload = function() {
            alert("Congratulations, your ticket is free!");
        };

        function updateTrainID(stationID) {
            if (stationID) {
                fetch(`GetTrainID.php?station_id=${stationID}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("train_id").innerText = data || "No Train Available";
                    })
                    .catch(error => {
                        console.error('Error fetching train ID:', error);
                        document.getElementById("train_id").innerText = "Error fetching train ID";
                    });
            } else {
                document.getElementById("train_id").innerText = "Select a station";
            }
        }
    </script>
</head>
<body>
    <!-- Header Section -->
    <section class="parallax">
        <header>
            <h1>Purchased Tickets</h1>
            <p>View your account details and ticket details!</p>
        </header>
    </section>

    <!-- Ticket Display -->
    <div class="ticket-container">
        <div class="ticket-info">
            <h2><b>Free Ticket</b></h2>
            <p><strong>Ticket ID:</strong> <?php echo $ticket_id; ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user_name); ?></p>
            <p><strong>Date:</strong> <?php echo $current_date; ?></p>
            <p><strong>Ticket Price:</strong> $0.00</p>
            <label for="station">Select Station:</label>
            <select id="station" name="station" onchange="updateTrainID(this.value)">
                <option value="">--Select Station--</option>
                <?php while ($row = $result_stations->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id_estacion_pk']; ?>">
                        <?php echo $row['nombre_estacion']; ?>
                    </option>
                <?php } ?>
            </select>
            <p><strong>Train ID:</strong> <span id="train_id">Select a station</span></p>
        </div>

        <div class="ticket-qr">
            <div id="qrcode"></div>
        </div>
    </div>

    <footer>
        <p class="footer-text">&copy; 2024 InstantRail. All rights reserved.</p>
    </footer>

    <!-- Generate QR Code Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let ticketID = "<?php echo $ticket_id; ?>";
            let userName = "<?php echo $user_name; ?>";
            let qrData = `https://yourwebsite.com/ticket.php?id=${ticketID}&user=${userName}`;
            new QRCode(document.getElementById("qrcode"), {
                text: qrData,
                width: 150,
                height: 150
            });
        });
    </script>
</body>
</html>
