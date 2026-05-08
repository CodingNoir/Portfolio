<!--
  -- logout_screen.php
  -- Ends user session and displays a logout message. It also displays a
  -- a link to retry access to system.
  -->
  
<?php
	
	// Resume user session.
	session_start();
	
	// Release session variables and end session.
	session_unset();
	session_destroy();
?>
	</head>
	
	<body class = "w3-background-image" 
	style="background-image: url('http://localhost/sistema/Pictures/sunsetbackground.jpg'); background-repeat: no-repeat; background-size: 3190px; background-position: center;">
	
		<h1>You are out of the system</h1>
		<a href="../InstantRail HomePage.html">Click Here to Login Again</a>
	</body>
</html>