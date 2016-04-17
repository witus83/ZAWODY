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
</head>
<body>
	<form name="form-logowanie" action="login.php" method="post">
		Login: <br /> <input type="text" name="login" /><br />
		Haslo: <br /> <input type="password" name="password" /> <br />
		<input type="submit" name="zaloguj" value="Zaloguj" />
	</form>
	<br />
	<a href="register.php">Rejestracja! </a> <br />
<?php
		if(isset($_SESSION['login_error'])) 
			echo $_SESSION['login_error'];
		
?>
</body>
</html>