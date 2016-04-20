<?php
session_start();

	if(!isset($_SESSION['logged'])) {	
		header('Location: index.php');
		exit();		
	}

		echo '<div id="topright">';
		echo 'Witaj '.$_SESSION['user'].'!!<br />';
		echo '<a href="logout.php">Wyloguj</a>';
		echo '</div>';
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>ZAWODY</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<style>
	.error{
		color:red;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	
	</style>	
</head>

<body>

<h2>Dodaj ZAWODY</h2>

	<form method="post" autocomplete="off">
		Nazwa zawodów<sup>*</sup>
		<input id="imie" type="text" name="firstname" placeholder="Podaj nazwę zawodów" maxlength="200" required/><br />
		Data:<sup>*</sup>
	
	
	
	
	</form>
	<sup>*</sup> - pole wymagane
</body> 
</html>