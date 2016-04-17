<?php 
session_start();

	if(!isset($_SESSION['logged'])) {	
		header('Location: index.php');
		exit();		
	}
		

?>

<!DOCTYPE HTML>
<html lang="pl" lang="pl">
<head>
	<title>..::LOGOWANIE::..</title>
	<meta charset="uft-8" />
</head>
<body>

	<?php	
		echo "<p>Witaj ".$_SESSION['user'].'!![<a href="logout.php">Wyloguj</a>]</p> ';
	?>
	
	<a href="addshooter.php">Dodaj strzelca</a>

</body>
</html>