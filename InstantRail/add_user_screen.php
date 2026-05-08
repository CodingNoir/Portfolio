<!--
  -- add_user_screen.php
  -- Displays the add-user form and submits the username, password and retyped
  -- password after validating their presence and format.
  -->

<?php
	// Copy common header into document.
	include "./common/header.php";
?>
		<script src="./scripts/validator.js"></script>
		<script>
			// Checks that two text boxes have the same contents.
			function equalContents(textBox1, name1, textBox2, name2) {
				if (!(textBox1.value === textBox2.value)) {
					alert("Error! " + name1 + " and " + name2 + " should be equal.");
					return false;
				}
				return true;
			}
			
			// Checks username and password are present and properly formatted.
			// Also checks that retyped password is equal to original password.
			function isValidData(form) {
				let valid =
					isPresent(form.user, "Username") &&
					matchesPattern(form.user, "Username", /^[a-zA-Z0-9]{5,}$/) &&
					
					isPresent(form.pwd, "Password") &&
					matchesPattern(form.pwd, "Password", /^[a-zA-Z0-9]{8,}$/)  &&
					
					equalContents(form.pwd, "Password", 
									form.retyped_pwd, "Retyped Password");
				return valid;
			}
			
			// Submits form data if valid.       
			function submitData() {
				let form = document.addUserForm;
				
				if (isValidData(form))
					form.submit();
			}
		</script>
		
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
</head>
	
	<body class = "w3-background-image" 
	style="background-image: url('http://localhost/sistema/Pictures/train2.jpg'); background-repeat: no-repeat; background-size: 3190px; background-position: center;">
	
<!-- Navbar ------------------>
 <div id="navDemo" class="w3-top">
  <div class="w3-bar w3-black w3-left-align">

    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    <a href="InstantRail HomePage.html" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
    <a href="AboutUs.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About Us</a>
    <a href="ticketing.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Get a Ticket</a>

    <a href="Estaciones/Stations.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Stations</a>
    <a href="ContactUs.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact Us</a>
    <a href="#cob" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantTracking</a>
	<a href="InstantNews.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">InstantNews</a>

    <!-- Language Dropdown -->
    <div class="w3-dropdown-hover w3-hide-small w3-right">
      <a href="#view" class="w3-bar-item w3-button w3-hover-gray"> <i class="fa fa-globe"></i> <span style="font-family: inherit;">Language</span> <i class="fa fa-caret-down"></i></a>
      <div class="w3-dropdown-content w3-bar-block w3-border">
        <a href="add_user_screen.php" class="w3-bar-item w3-button">English</a>
        <a href="add_user_screenSpanish.php" class="w3-bar-item w3-button">Spanish</a>
      </div>
    </div>
    <!-- Language Dropdown -->

    <a href="add_user_screen.php" class="w3-button w3-right w3-hover-green">Sign Up</a>
    <a href="login_screen.php" class="w3-button w3-right w3-hover-blue">Log In</a>

  </div>
</div>
<!------------------------------->
			
		<!-- Spaces -->
			<br> <br><br><br><br> <br><br><br>
		<!-- Spaces -->
		
		<!-- Second Main Internal Row ---------------------------->
			<div class = "w3-row">
			
<div class = "w3-quarter w3-padding"> </div>
		
		<!-- Start of Form -->
			<form name="addUserForm" method="post" action="add_user.php"
			
				class = "w3-card-4 w3-half w3-mobile w3-transparent w3-padding w3-round-xxlarge w3-border w3-hover-border-black" style= "backdrop-filter:blur(15px);"> 
				<h1 class = "w3-xxlarge w3-text-orange w3-cursive" style= "text-align: center;"> Sign up for an InstantRail Account</h1> <br>
			
		<!-- Div Centering -->
			<div class="w3-display-container w3-center">
				
				<label class = "w3-text-orange">Enter a Username:</label> <br>
				<input type = "text" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "user"  
				       style="border: none; border-bottom: 2px solid white; outline: none; width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
					   
				<label class = "w3-text-orange">Enter email:</label> <br>
				<input type = "text" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "emeil"  
				       style="border: none; border-bottom: 2px solid white; outline: none; width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
				
				<label class= "w3-text-orange">Enter a password:</label> <br>
				<input type = "password" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "pwd"
				       style="border: none; border-bottom: 2px solid white; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
					   
				<label class= "w3-text-orange">Retype password:</label> <br>
				<input type = "password" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "retyped_pwd"
				       style="border: none; border-bottom: 2px solid white; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
			    
		<!-- Date of Birth -->
			<label class="w3-text-orange">Date of Birth:</label> <br>
					<input type="date"  class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "fecha_nacimiento"
					style="border: none; border-bottom: 2px solid white; outline: none;width: 400px; margin: 0 auto; text-align: center;">
				</select> <br> <br>

		<!-- Are You a Student? -->
			<label class="w3-text-orange">Are you a student?</label> <br>
				<div style="width: 400px; margin: 0 auto; text-align: center;">
					<input type="radio" id="student_yes" name="student_status" value="Activo" class="w3-radio">
						<label for="student_yes" class="w3-text-white" style="margin-right: 20px;">Yes</label>
							<input type="radio" id="student_no" name="student_status" value="Inactivo" class="w3-radio">
						<label for="student_no" class="w3-text-white">No</label>
				</div> <br>

		<!-- Do You Have a Disability? Choice -->
			<label class="w3-text-orange">Do you have a disability?</label> <br>
				<div style="width: 400px; margin: 0 auto; text-align: center;">
					<input type="checkbox" id="disability" name="disability_status" value="si" class="w3-check">
						<label for="disability" class="w3-text-white">Yes, I have a disability</label>
				</div> <br>
			
				
			<!-- Third Main Internal Row --------Button----------------->
				<div class = "w3-row">
			
					<div class = "w3-quarter w3-padding"> </div>
						<input type= "submit" class = "w3-btn w3-large w3-border w3-transparent w3-hover-text-white w3-hover-border-blue w3-hover-green w3-half w3-text-black w3-grey w3-round-xxlarge" 
						       value = "Save & Submit" onclick="submitData();"> <br> <br>
					<div class = "w3-quarter w3-padding"> </div>
				
			<!-- End of Third Main Internal Row -----Button-------------->
				</div>
				
				<label class = "w3-text-white"> Already have an account? </label> <a href = "login_screen.php"> <label class = " w3-text-white w3-hover-text-blue" >Log in Now</label> </a> <br> <br>
				
			</div>
			<div class = "w3-text-white">@Copyright Sunrise Ventures </div> 
			<!-- End of Second Main Row ------------------------------->
			</div>
		</form>
		
		<!-- Spaces -->
			<br> <br>
		<!-- Spaces -->
		
		<!-- Spaces -->
			<br> <br> <br> <br>
		<!-- Spaces -->
		
	</body>
</html>