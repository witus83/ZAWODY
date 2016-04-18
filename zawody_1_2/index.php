<?php
	session_start();

	if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
		header('Location: mainpage.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<title>..::LOGOWANIE::..</title>
	<meta charset="utf-8">
	<meta name="author" content="Piotr Witkowski">
	  <meta name="description" content="Obsługa zawodów strzeleckich">
	  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="center">
	<div id="panel">

		<form action="login.php" method="post">
			<label for="username">Login:</label>
			<input type="text" name="login" id="username" />
			<label for="password">Hasło:</label> 
			<input type="password" id="password" name="password" /> <br />
			
				<?php
					if(isset($_SESSION['login_error'])) 
					echo $_SESSION['login_error'];
				?>
			
			<div id="lower">	
				<input type="submit" name="zaloguj" value="Zaloguj" />
			</div>
		</form>
<!--		<a href="register.php">Rejestracja! </a> <br /> -->
	

	
	</div>
</div>


</body>
</html>