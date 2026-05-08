<?php
session_start(); // Start the session to access logged-in user data

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
    $user_name = $_SESSION['nombre_usuario_pk']; // Use the session-stored username
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

    <!-- Optional custom styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 3rem;
            color: #00bfae;
        }

        header p {
            font-size: 1.2rem;
            margin: 10px 0;
        }
		
		/* Updated Navbar Hover Effect */
    .w3-bar a:hover {
      background-color: #00bfae;
      color: #fff;
    }
	 /* Interactive Button Effects */
    .w3-button {
      border-radius: 50px;
      transition: background-color 0.3s ease;
    }

    .w3-button:hover {
      background-color: #00bfae;
    }
	
	 /* Animation for fadeIn effect */
    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

        .ticket-card {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .ticket-card h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .ticket-info p {
            font-size: 1rem;
            margin: 10px 0;
            color: #555;
        }

        .dropdown {
            text-align: center;
            margin: 20px 0;
        }

        .dropdown label {
            font-size: 1rem;
            color: #333;
        }

        select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            display: block;
            margin: 0 auto;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        .footer-text {
            font-size: 0.9rem;
        }
    </style>
</head>

  
 <script>
   // Display congratulations popup
        window.onload = function() {
            alert("Congratulations, your ticket is free!");
        };
 
 // Update train ID dynamically based on selected station
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

<body id="myPage">

    <!-- Navbar ------------------>
  <div id="navDemo" class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align">

      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="InstantRail HomePageLogged.html" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
      <a href="AboutUsLogged.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About Us</a>
      <a href="ticketingLogged.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Get a Ticket</a>
      <a href="Estaciones/StationsLogged.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Stations</a>
      <a href="ContactUsLogged.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact Us</a>
      <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantTracking</a>
	  <a href="InstantNewsLogged.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantNews</a>
	  

      <!-- Language Dropdown -->
      <div class="w3-dropdown-hover w3-hide-small w3-right">
        <a href="#view" class="w3-bar-item w3-button w3-hover-gray"> <i class="fa fa-globe"></i> <span style="font-family: inherit;">Language</span> <i class="fa fa-caret-down"></i></a>
        <div class="w3-dropdown-content w3-bar-block w3-border">
          <a href="Ticketing.html" class="w3-bar-item w3-button">English</a>
          <a href="ticketingSpanish.html" class="w3-bar-item w3-button">Spanish</a>
        </div>
      </div>

      <!-- User Profile Dropdown -->
	<div class = "w3-dropdown-hover w3-hide-small w3-right">
		<a href="#view" class="w3-button w3-right w3-hover-blue"><i class="fa fa-user"></i> <span style="font-family: inherit;">Profile</span> <i class="fa fa-caret-down"></i></a>
			<div class = "w3-dropdown-content w3-bar-block w3-border">
				<a href="ViewTicketAccount.php" class="w3-bar-item w3-button">View Purchased Tickets</a>
				<a href="logout.php" class="w3-bar-item w3-button w3-hover-red" onclick="return confirm('Are you sure you want to log out?');">Log out</a>
			</div>

  </div>

    </div>
  </div>

  <!-- Header Section -->
  <section class="parallax">
    <header>
        <h1>Purchased Tickets</h1>
        <p>View your account details and ticket details!</p>
    </header>
  </section>

  <!-- Ticket Details Section -->
  <div class="ticket-card">
      <h2>Ticket Details</h2>
      <div class="ticket-info">
          <p><strong>Ticket ID:</strong> <?php echo $ticket_id; ?></p>
          <p><strong>Username:</strong> <?php echo htmlspecialchars($user_name); ?></p>
          <p><strong>Date:</strong> <?php echo $current_date; ?></p>
          <p><strong>Ticket Price:</strong> $0.00</p>
      </div>
      <div class="dropdown">
          <label for="station">Select Station:</label>
          <select id="station" name="station" onchange="updateTrainID(this.value)">
              <option value="">--Select Station--</option>
              <?php while ($row = $result_stations->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id_estacion_pk']; ?>">
                      <?php echo $row['nombre_estacion']; ?>
                  </option>
              <?php } ?>
          </select>
      </div>
      <p><strong>Train ID:</strong> <span id="train_id">Select a station</span></p>
  </div>

  <footer>
      <p class="footer-text">&copy; 2024 InstantRail. All rights reserved.</p>
  </footer>
  
  <!-- Contact Section -->
  <section id="contact" class="w3-container w3-theme-d1 w3-center w3-padding-64" style="background-color: #000;">
    <footer>
      <h4 class="w3-text-teal">Contact Us</h4>
      <p><i class="w3-xlarge fa fa-map-marker w3-text-teal"></i> Puerto Rico, US</p>
      <p><i class="w3-xlarge fa fa-phone w3-text-teal"></i> +00 1515151515</p>
      <p><i class="w3-xlarge fa fa-envelope w3-text-teal"> </i> InstantRail@gmail.com</p>
	  
	  <div class="w3-left w3-text-teal" style="display: flex; align-items: center;">
  <img src="../images2/favicon_io/edited_1.png" alt="Avatar" class="w3-circle w3-margin-right w3-image" style="width:30px; height:30px;">
  <p><i class="w3-xlarge"></i> Powered by Sunshine Venture</p>
</div>

    </footer>
  </section>


</body>
</html>
