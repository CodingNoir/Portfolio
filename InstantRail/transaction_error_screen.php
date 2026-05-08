<!--
  -- transaction_error_screen.php
  -- Displays a transaction error message and links to continue using
  -- the system.
  -->
  
<?php
	// Authenticate user session and copy common header into document.
	include "./common/authenticate.php";
?>
	</head>
	
	<body>
		<div class="w3-container w3-center w3-xlarge">
			<i class="fa fa-times-circle fa-4x w3-text-red"></i>
			<h1><?php echo $_GET["error"]; ?></h1>
		</div>
	  
	</body>
</html>