<!--
  -- login_error_screen.php
  -- Displays a login error message and a link to retry access to the system.
  -->
  
<?php
	// Copy common header into document.
    include "./common/header.php";
?>
	</head>
	
	<body class = "w3-background-image" 
	style="background-image: url('http://localhost/sistema/Pictures/sunsetbackground.jpg'); background-repeat: no-repeat; background-size: 2990px; background-position: center;">
		<div class="w3-container w3-center w3-xlarge">
			<i class="fa fa-times fa-4x w3-text-red"></i>
			<h1>Invalid Username or Password!</h1>
			<a href="./login_screen.php" class = "w3-hover-text-blue">Click Here to Return to Login Screen</a>
		</div>
	</body>
</html>