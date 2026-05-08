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
	</head>
	
	<body class = "w3-background-image" 
	style="background-image: url('http://localhost/sistema/Pictures/train2.jpg'); background-repeat: no-repeat; background-size: 3190px; background-position: center;">
	
		<!-- First Main Internal Row -->
			<div class = "w3-row">
			
			   <!-- Starts Menu with Links ------------------------------------------------------------------->
			<div class = "w3-bar w3-black w3-round-large">
				<a href="InstantRail SpanishHomePage.html"  class="w3-bar-item  w3-mobile w3-button">  Inicio &crarr; </a>	
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Placeholder  </a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Placeholder </a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Sobre Nosotros</a>
				<a href=""  class="w3-bar-item  w3-mobile w3-button">  Contactanos </a>
			<!-- Ends Menu ---------------------------------------------------------------------------------->
			</div>
			
				<div class = "w3-quarter w3-padding"> </div>
					<div class = "w3-panel w3-half w3-center w3-text-white w3-opacity w3-border w3-round-large w3-xxlarge" style= "backdrop-filter:blur(15px);">
						<a href = "add_user_screen.php"> <p class = "fa fa-globe w3-text-yellow w3-hover-text-pink"> Ingles |</p> </a>
						<a href = "add_user_screen_spanish.php"> <p class = "fa fa-globe w3-hover-text-green w3-text-yellow"> Espanol </p> </a>
					</div>
				<div class = "w3-quarter w3-padding"> </div>
	
		<!-- End of Main Internal Row -->
			</div>
			
		<!-- Spaces -->
			<br> <br>
		<!-- Spaces -->
		
		<!-- Second Main Internal Row ---------------------------->
			<div class = "w3-row">
			
<div class = "w3-quarter w3-padding"> </div>
		
		<!-- Start of Form -->
			<form name="addUserForm" method="post" action="add_user.php"
			
				class = "w3-card-4 w3-half w3-mobile w3-transparent w3-padding w3-round-xxlarge w3-border w3-hover-border-black" style= "backdrop-filter:blur(15px);"> 
				<h1 class = "w3-xxlarge w3-text-orange w3-cursive" style= "text-align: center;"> Registra una cuenta InstantRail</h1> <br>
			
		<!-- Div Centering -->
			<div class="w3-display-container w3-center">
				<label class = "w3-xlarge w3-text-green">Crear una nueva cuenta</label>
				
				 <br> <br> <br>
				
				<label class = "w3-text-orange">Entra nombre de usuario:</label> <br>
				<input type = "text" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "user"  
				       style="border: none; border-bottom: 2px solid white; outline: none; width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
				
				<label class= "w3-text-orange">Entra contrasena:</label> <br>
				<input type = "password" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "pwd"
				       style="border: none; border-bottom: 2px solid white; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
					   
				<label class= "w3-text-orange">Re-escribe contrasena:</label> <br>
				<input type = "password" class = "w3-input w3-text-white w3-padding w3-mobile w3-transparent" name = "retyped_pwd"
				       style="border: none; border-bottom: 2px solid white; outline: none;width: 400px; margin: 0 auto; text-align: center;"> <br> <br>
			
			
				
			<!-- Third Main Internal Row --------Button----------------->
				<div class = "w3-row">
			
					<div class = "w3-quarter w3-padding"> </div>
						<input type= "submit" class = "w3-btn w3-large w3-border w3-transparent w3-hover-text-white w3-hover-border-blue w3-hover-green w3-half w3-text-black w3-grey w3-round-xxlarge" 
						       value = "Guardar y Someter" onclick="submitData();"> <br> <br>
					<div class = "w3-quarter w3-padding"> </div>
				
			<!-- End of Third Main Internal Row -----Button-------------->
				</div>
				
				<label class = "w3-text-white"> Ya tienes una cuenta existente? </label> <a href = "login_screen_spanish.php"> <label class = " w3-text-white w3-hover-text-blue" >Inicia ahora</label> </a> <br> <br>
				
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