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
	<link rel="stylesheet" href="css/style.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='mainpage.php'>Home</a></li>
   <li class='active'><a href='#'>STRZELCY</a>
      <ul>
         <li><a href='addshooter.php'>Dodaj STRZELCA</a>
         </li>
         <li><a href='searchshooter.php'>Wyszukaj STRZELCA</a>
         </li>
      </ul>
   </li>
   <li><a href='#'>About</a></li>
   <li><a href='#'>Contact</a></li>
	<li><a href='logout.php'>Wyloguj</a></li>
   </ul>
</div>

<div id="topright">	
	<?php	
		echo "<p>Witaj ".$_SESSION['user'].'!![<a href="logout.php">Wyloguj</a>]</p> ';
	?>
</div>

</body>
</html>