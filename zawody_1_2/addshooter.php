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
	
	if (isset($_POST['email']) || isset($_POST['LastName'])) {
	
		$form_add_ok = true;
		
		//walidacja email
	
	$newfirstname = $_POST['firstname'];
	$newlastname = $_POST['lastname'];
	$newcity = $_POST['city'];
	$newclub = $_POST['club'];
	$newislicence = $_POST['islicence'];
	$newbirthdate = $_POST['birthdate'];
	$newemail = $_POST['email'];
	$newphone = $_POST['phone'];
	$newnotes = $_POST['notes'];
	
	require "connection.php";	
	//seria ifów

	//walidacja email
	$newemail_ok = filter_var($newemail, FILTER_SANITIZE_EMAIL);
	
	if((filter_var($newemail_ok, FILTER_VALIDATE_EMAIL)== false) || ($newemail_ok != $newemail)) {
			
			$form_ok = false;
			$_SESSION['e_newemail'] = "Podaj poprawny adres email!!";
		}
	//walidacja czy ktoś o podanym nazwisku i dacie urodzenia jest w bazie
		
	$result = $mysqli->query ("select ID from shooter where (lastname='$newlastname' and BirthDate='$newbirthdate') or (lastname='$newlastname' and BirthDate='$newbirthdate') or (lastname='$newlastname' and Email='$newemail')");
//	$row_count=mysqli_num_rows($result);
//	echo $row_count;
	
	if (mysqli_num_rows($result)>0){
		
		$form_ok = false;
		$_SESSION['e_newshooter'] = "Taki gość istnieje juz w bazie!!";
		
	}
	
	
	
	

	//$sql="CALL `insert_shooter`('$firstname', '$lastname', '$city', '$club',$islicence,'$birthdate','$email','$phone','$notes')";
	//$mysqli->query($sql);

//	echo "Rekord poprawnie dodany do bazy danych!!";
	$mysqli->close();	

	}
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

   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>

<style>
	.error{
		color:red;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	
	</style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='mainpage.php'>Home</a></li>
   <li class='active'><a href='#'>STRZELCY</a>
      <ul>
         <li><a href='addshooter.php'>Dodaj STRZELCA</a>
         </li>
         <li><a href='#'>Product 2</a>
            <ul>
               <li><a href='#'>Sub Product</a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='#'>About</a></li>
   <li><a href='#'>Contact</a></li>
	<li><a href='logout.php'>Wyloguj</a></li>
   </ul>
</div>

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
			Czy zawodnik posiada licencję:<sup>*</sup> <br />
			<input type="radio" name="islicence" value="true" required/>Tak <br>
			<input type="radio" name="islicence" value="false" required/>Nie <br>
		</fieldset>
		Data urodzenia:<sup>*</sup>
		<script type="text/javascript">
			jQuery(function($){
				$("#date").mask("9999-99-99");
				$("#phone").mask("999-999-999");
			});
		</script>
		<input type="text" placeholder="Data urodzenia" id="date" name="birthdate" required/><br />
		Email:
		<input type="email" name="email" maxlength="100" placeholder="Podaj adres email" /><br />
		<?php
			if(isset($_SESSION['e_newlogin'])) {
				echo '<div class="error">'.$_SESSION['e_newlogin'].'</div>';
				unset($_SESSION['e_newlogin']);	
			}
		?>
		Telefon:
		<input type="text" placeholder="Telefon" id="phone" name="phone" /><br />
		Uwagi:
		<textarea name="notes" placeholder="Uwagi" id="textarea" rows="4" cols="50"></textarea>
		<br />
			<?php
			if(isset($_SESSION['e_newshooter'])) {
				echo '<div class="error">'.$_SESSION['e_newshooter'].'</div>';
				unset($_SESSION['e_newshooter']);	
			}
		?>
		<input type="reset" value="WYCZYŚĆ" />
		<input type="submit" value="ZAPISZ" /><br />
	</form>
	<sup>*</sup> - pole wymagane
</body> 
</html>