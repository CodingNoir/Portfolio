<!--
  -- login_screen.php for Sunrise Ventures Login Page ---- This is a test demo
  -- Displays the login form and submits the username and password after
  -- validating their presence and format.
  -->

<?php
	// Copy common header into document.
	include "./common/header.php";
?>
	<!--External Javascript -->
		<script src="./scripts/validator.js"></script>
	<!--External Javascript -->
	
	<!--Internal Javascript -->
		<script>
			// Checks username and password are present and properly formatted.
			function isValidData(form) {
				let valid =
					isPresent(form.user, "Username") &&
					matchesPattern(form.user, "Username", /^[a-zA-Z0-9]{5,}$/) &&
					
					isPresent(form.pwd, "Password") &&
					matchesPattern(form.pwd, "Password", /^[a-zA-Z0-9]{8,}$/);
				return valid;
			}
			
			// Submits form data if valid.
			function submitData() {
				let form = document.signInForm;
				
				if (isValidData(form))
					form.submit();
			}
		</script>
	<!--Internal Javascript -->
	
	<!-- Responsive !-->
		<meta charset= "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- W3.CSS Stylesheet !-->
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		
<!-- Optional custom styles -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }

    header {
      background: #000;
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }

    header h1 {
      font-size: 3rem;
      color: #00bfae;
      animation: fadeIn 2s ease-in-out;
    }

    header p {
      font-size: 1.5rem;
      color: #fff;
      margin-top: 20px;
      animation: fadeIn 3s ease-in-out;
    }

    .w3-bar a {
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Updated Navbar Hover Effect */
    .w3-bar a:hover {
      background-color: #00bfae;
      color: #fff;
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

    /* Interactive Button Effects */
    .w3-button {
      border-radius: 50px;
      transition: background-color 0.3s ease;
    }

    .w3-button:hover {
      background-color: #00bfae;
    }

    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
    }
  </style>
<!-- End of Head  ---->
	</head>
	
<!-- Start of Body -->
	<body class = "w3-background-image"  
	style="background-image: url('http://localhost/sistema/Pictures/train1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	
<!-- Navbar ------------------>
	<div id="navDemo" class="w3-top">
		<div class="w3-bar w3-black w3-left-align">

			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
			<a href="InstantRail HomePage.html" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
			<a href="AboutUs.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About Us</a>
			<a href="ticketing.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Get a Ticket</a>
   

			<a href="Estaciones/Stations.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Stations</a>
			<a href="ContactUs.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact Us</a>
			<a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantTracking</a>
			<a href="InstantNews.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantNews</a>
			

    <!-- Language Dropdown -->
		<div class="w3-dropdown-hover w3-hide-small w3-right">
			<a href="#view" class="w3-bar-item w3-button w3-hover-gray"> <i class="fa fa-globe"></i> <span style="font-family: inherit;">Language</span> <i class="fa fa-caret-down"></i></a>
			<div class="w3-dropdown-content w3-bar-block w3-border">
				<a href="InstantRail HomePage.html" class="w3-bar-item w3-button">English</a>
				<a href="InstantRail SpanishHomePage.html" class="w3-bar-item w3-button">Spanish</a>
			</div>
		</div>
    <!-- Language Dropdown -->

			<a href="add_user_screen.php" class="w3-button w3-right w3-hover-green">Sign Up</a>
			<a href="login_screen.php" class="w3-button w3-right w3-hover-blue">Log In</a>

		</div>
	</div>
<!------------------------------->

	<!-- First Main Container -->
		<div class = "w3-container w3-cursive">
		
			
		<!-- Spaces -->
			<br> <br> <br> <br> <br> <br>  <br> <br> <br> <br> 
		<!-- Spaces -->
		
		<!-- Second Main Internal Row ---------------------------->
			<div class = "w3-row">
			
<div class = "w3-quarter w3-padding"> </div>
		<!-- Start of Form -->
			<form name="signInForm" method="post" action="login.php"
				
				class = "w3-card-4 w3-half w3-mobile w3-transparent w3-padding w3-round-xxlarge w3-border w3-hover-border-black" style= "backdrop-filter:blur(15px);"> 
				<h1 class = "w3-xxlarge w3-text-black w3-cursive" style= "text-align: center;"> Log into your InstantRail Account </h1> <br> <br> <br> <br>
			
		<!-- Div Centering -->
			<div class="w3-display-container w3-center">
				
				<label class = "w3-text-black">Username</label> <i class='bx bxs-user'></i> <br>
				<input type = "text" placeholder = "Username" class = "w3-input w3-text-black w3-padding w3-mobile w3-transparent" name = "user"  
				       style="border: none; border-bottom: 2px solid black; outline: none; width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
				
				<label class= "w3-text-black">Password</label> <i class='bx bxs-lock-alt' ></i><br>
				<input type = "password" placeholder = "Password" class = "w3-input w3-text-black w3-padding w3-mobile w3-transparent" name = "pwd"
				       style="border: none; border-bottom: 2px solid black; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
			
			
				
			<!-- Third Main Internal Row --------Button----------------->
				<div class = "w3-row">
			
					<div class = "w3-quarter w3-padding"> </div>
						<input type= "submit" class = "w3-btn w3-large  w3-border w3-border-black w3-transparent w3-hover-text-red w3-hover-border-red w3-half w3-text-black w3-round-xxlarge" 
						       value = "Sign In" onclick="submitData();"> <br> <br>
					<div class = "w3-quarter w3-padding"> </div>
				
			<!-- End of Third Main Internal Row -----Button-------------->
				</div>
				
				<label class = "w3-text-black"> Don't have an account? </label> <a href = "add_user_screen.php"> <label class = " w3-text-black w3-hover-text-blue" >Sign Up Now</label> </a> <br> <br>
				<label class = "w3-text-black w3-hover-text-red">  <a href = "ContactUs.html"> Forgot your Password? </label> <br> <br> <br> <br> <br> <br> 
		<!-- Ends Div Centering -->
			</div> 
			
				<div class = "w3-text-black">@Copyright Sunrise Ventures </div> 
		<!-- End of Form -->
			</form>
		<!-- End of Second Main Row ------------------------------->
			</div>
	<!-- End of First Main Container -->
		</div>
<!-- End of Body -->
	</body>
</html>