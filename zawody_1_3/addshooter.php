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
		$newlicencenr = $_POST['licencenr'];
		$newemail = $_POST['email'];
		$newphone = $_POST['phone'];
		$newnotes = $_POST['notes'];
		
		require "connection.php";	
		//seria ifów

		//walidacja email
		
		if($newemail !=='') {
		
			$newemail_ok = filter_var($newemail, FILTER_SANITIZE_EMAIL);
			
			if((filter_var($newemail_ok, FILTER_VALIDATE_EMAIL)== false) || ($newemail_ok != $newemail)) {
					$form_add_ok = false;
					$_SESSION['e_newemail'] = "Podaj poprawny adres email!!";
			}
		
		}
		//walidacja czy ktoś o podanym nazwisku i dacie urodzenia jest w bazie
		$result = $mysqli->query("SELECT * FROM SHOOTER WHERE FirstName = '$newfirstname' and LastName = '$newlastname' and City='$newcity'");

		if (mysqli_num_rows($result)>0){
			
			$form__add_ok = false;
			$_SESSION['e_newshooter'] = "Taki gość istnieje juz w bazie!!";
		}
		
	//	$form_ok = false;
	//		$_SESSION['e_newshooter'] = "Taki gość istnieje juz w bazie!!";
		
		if ($form_add_ok == true){	
		//formularz ok!!
		//insert do bazy + przekierowanie i podsumowanie rejestracji
//		echo "Wszystko OK!!";
			
			$_SESSION['register_ok'] = true;
			
			$sql="CALL `insert_shooter`('$newfirstname', '$newlastname', '$newcity', '$newclub',$newislicence,'$newlicencenr','$newemail','$newphone','$newnotes')";
			$mysqli->query($sql);
			$_SESSION['insert_OK'] = "Strzelec poprawnie dodany do bazy danych!!";
			

		}
	
		$mysqli->close();
	}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
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

<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ZAWODY</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="mainpage.php">HOME</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">STRZELCY <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="addshooter.php">Dodaj Strzelca</a></li>
                  <li><a href="searchshooter.php">Wyszukaj strzelca</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">STRZELCY</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>



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
		Numer Licencji:<sup>*</sup>
		<script type="text/javascript">
			jQuery(function($){
				$("#date").mask("9999-99-99");
				$("#phone").mask("999-999-999");
			});
		</script>
		<input type="text" placeholder="Numer Licencji" name="licencenr"/><br />
		Email:
		<input type="email" name="email" maxlength="100" placeholder="Podaj adres email" /><br />
		<?php
			if(isset($_SESSION['e_newemail'])) {
				echo '<div class="error">'.$_SESSION['e_newemail'].'</div>';
				unset($_SESSION['e_newemail']);	
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
		
			<?php
				if(isset($_SESSION['insert_OK'])) {
					echo '<div class="error">'.$_SESSION['insert_OK'].'</div>';
					unset($_SESSION['insert_OK']);	
				}
			?>
	</form>
	<sup>*</sup> - pole wymagane
</body> 
</html>