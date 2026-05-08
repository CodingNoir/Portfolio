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
		
<!-- End of Head  ---->
	</head>
	
<!-- Start of Body -->
	<body class = "w3-background-image" 
	style="background-image: url('http://localhost/sistema/Pictures/train1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	
	<!-- First Main Container -->
		<div class = "w3-container w3-cursive">
		
			<!-- Starts Menu with Links ------------------------------------------------------------------->
			<div class = "w3-bar w3-black w3-round-large">
				<a href="InstantRail SpanishHomePage.html"  class="w3-bar-item  w3-mobile w3-button">  Inicio &crarr; </a>	
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Placeholder  </a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Placeholder </a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Sobre Nosotros</a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Contactanos </a>
			<!-- Ends Menu ---------------------------------------------------------------------------------->
			</div>
			
			<a href = "login_screen.php"> <p class = "fa fa-globe w3-text-blue w3-hover-text-pink"> Ingles |</p> </a>
			<a href = "login_screen_spanish.php"> <p class = "fa fa-globe w3-hover-text-green w3-text-blue"> Espanol </p> </a>
			
		<!-- Spaces -->
			<br> <br> <br> <br> <br> <br> 
		<!-- Spaces -->
		
		<!-- Second Main Internal Row ---------------------------->
			<div class = "w3-row">
			
<div class = "w3-quarter w3-padding"> </div>
		<!-- Start of Form -->
			<form name="signInForm" method="post" action="login.php"
				
				class = "w3-card-4 w3-half w3-mobile w3-transparent w3-padding w3-round-xxlarge w3-border w3-hover-border-black" style= "backdrop-filter:blur(15px);"> 
				<h1 class = "w3-xxlarge w3-text-black w3-cursive" style= "text-align: center;"> Inicia a tu cuenta InstantRail </h1> <br> <br> <br> <br>
			
		<!-- Div Centering -->
			<div class="w3-display-container w3-center">
				
				<label class = "w3-text-black">Nombre de Usuario</label> <i class='bx bxs-user'></i> <br>
				<input type = "text" placeholder = "Username" class = "w3-input w3-text-black w3-padding w3-mobile w3-transparent" name = "user"  
				       style="border: none; border-bottom: 2px solid black; outline: none; width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
				
				<label class= "w3-text-black">Contrasena</label> <i class='bx bxs-lock-alt' ></i><br>
				<input type = "password" placeholder = "Password" class = "w3-input w3-text-black w3-padding w3-mobile w3-transparent" name = "pwd"
				       style="border: none; border-bottom: 2px solid black; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
			
			
				
			<!-- Third Main Internal Row --------Button----------------->
				<div class = "w3-row">
			
					<div class = "w3-quarter w3-padding"> </div>
						<input type= "submit" class = "w3-btn w3-large w3-border w3-border-black w3-transparent w3-hover-text-red w3-hover-border-red w3-half w3-text-black w3-round-xxlarge" 
						       value = "Iniciar Sesion" onclick="submitData();"> <br> <br>
					<div class = "w3-quarter w3-padding"> </div>
				
			<!-- End of Third Main Internal Row -----Button-------------->
				</div>
				
				<label class = "w3-text-black"> No tienes una cuenta existente? </label> <a href = "add_user_screen_spanish.php"> <label class = " w3-text-black w3-hover-text-blue" >Crear una cuenta ahora</label> </a> <br> <br>
				<label class = "w3-text-black w3-hover-text-red"> Olvido su nombre de usuario? </label> <br> 
				<label class = "w3-text-black w3-hover-text-red"> Olvido su contrasena? </label> <br> <br> <br> <br> <br> <br> 
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