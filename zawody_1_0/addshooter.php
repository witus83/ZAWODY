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
		
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$city = $_POST['city'];
	$club = $_POST['club'];
	$islicence = $_POST['islicence'];
	$birthdate = $_POST['birthdate'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$notes = $_POST['notes'];
	
	
	//seria ifów
	
	require "connection.php";
	$sql="CALL `insert_shooter`('$firstname', '$lastname', '$city', '$club',$islicence,'$birthdate','$email','$phone','$notes')";
	$mysqli->query($sql);

//	echo "Rekord poprawnie dodany do bazy danych!!";
	$mysqli->close();	
		
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
</head>

<body>

<h2>Dodaj STRZELCA</h2>

	<form method="post" autocomplete="off">
		Imię<sup>*</sup>
		<input id="imie" type="text" name="firstname" placeholder="Imię" maxlength="100" required/><br />
		Nazwisko:<sup>*</sup>
		<input type="text" name="lastname" maxlength="200" placeholder="Nazwisko" required /><br />
		Miasto:<sup>*</sup>
		<input type="text" name="city" maxlength="150" placeholder="Miasto" required/><br />
		Klub:
		<input type="text" name="club" placeholder="Nazwa Klubu" maxlength="150" /><br />
		<fieldset>
			Czy zawodnik posiada licencję: <br />
			<input type="radio" name="islicence" value="true"/>Tak <br>
			<input type="radio" name="islicence" value="false" checked/>Nie <br>
		</fieldset>
		Data urodzenia:
		<script type="text/javascript">
			jQuery(function($){
				$("#date").mask("9999-99-99");
				$("#phone").mask("999-999-999");
			});
		</script>
		<input type="text" placeholder="Data urodzenia" id="date" name="birthdate"/><br />
		Email:
		<input type="email" name="email" maxlength="100" placeholder="Podaj adres email" /><br />
		Telefon:
		<input type="text" placeholder="Telefon" id="phone" name="phone" /><br />
		Uwagi:
		<textarea name="notes" placeholder="Uwagi" id="textarea" rows="4" cols="50"></textarea>
		<br />
		<input type="reset" value="WYCZYŚĆ" />
		<input type="submit" value="ZAPISZ" /><br />
	</form>
	<sup>*</sup> - pole wymagane
	
	
</body> 
</html>