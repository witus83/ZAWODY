<?php
	session_start();
	
	if (isset($_POST['newemail'])) {
		
		//udana walidacja
		$form_ok = true;
		
		//walidacja nowego loginu
		$newlogin = $_POST['newlogin'];
		
		//Sprawdzenie iloœci znaków newlogin
		
		if ((strlen($newlogin)<3) || (strlen($newlogin>20))) {
			
			$form_ok = false;
			$_SESSION['e_newlogin'] = "Login musi posiadac wiecej niz 3 znaki i mniej niz 20!!";
			
		}

		if (ctype_alnum($newlogin)==false) {
			
			$form_ok = false;
			$_SESSION['e_newlogin'] = "Login musi skladac sie z liter i cyfr, bez polskich znakow";
			
		}
		
		//walidacja adresu email
		
		$newemail = $_POST['newemail'];
		$newemail_ok = filter_var($newemail, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($newemail_ok, FILTER_VALIDATE_EMAIL)== false) || ($newemail_ok != $newemail)) {
			
			$form_ok = false;
			$_SESSION['e_newemail'] = "Podaj poprawny adres email!!";
		}
		
		//Walidacja d³ugoœci has³a
		
		$newpassword1 = $_POST['newpassword1'];
		$newpassword2 = $_POST['newpassword2'];
		
		if((strlen($newpassword1)<8) || (strlen($newpassword1)>20)){
			
			$form_ok = false;
			$_SESSION['e_newpassword1'] = "Haslo musi posiadac wiecej niz 8 znakow i mniej niz 20!!";

		}
		
		if($newpassword1!=$newpassword2){
			
			$form_ok = false;
			$_SESSION['e_newpassword1'] = "Hasla nie sa takie same!!";
			
		}
		
		//$newpassword1 = md5($newpassword1);
		
		$newpassword1=password_hash($newpassword1,PASSWORD_DEFAULT);
		
		//czy zaakceptowano regulamin
	
		if(!isset($_POST['acceptance'])){
			
			$form_ok = false;
			$_SESSION['e_acceptance'] = "Zaakceptuj regulamin!!";
			
		}
		
	//Bot czy nie bot?
	
//		$captcha_key="6LchVh0TAAAAAEVcnJKXlGllpaIQlJJIE5Eo5iJ6";
//		$captcha_check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captcha_key.'&response='.$_POST['g-recaptcha-response']);
//		$captcha_response = json_decode($captcha_check)	;	
		
//		if($captcha_response->success == false){
//			
//			$form_ok = false;
//			$_SESSION['e_captcha_response'] = "Sio Robocie!!";
			
//		}
		
		require "connection.php";

		//czy taki login ju¿ instnieje w bazie
		
		$result = $mysqli->query("select ID from USER where Login = '$newlogin'");
		
		if (!$result) throw new Exception($mysqli->error);
		
		if(mysqli_num_rows($result)>0){
			$form_ok = false;
			$_SESSION['e_newlogin'] = "Taki login istnieje juz w bazie!!";	
		}
		
		if ($form_ok == true){	
			//formularz ok!!
			//insert do bazy + przekierowanie i podsumowanie rejestracji
//			echo "Wszystko OK!!";
			
			$_SESSION['register_ok'] = true;
			header ('Location:welcome.php');
			
			exit();	
		}
		
		$mysqli->close;
		
	}
?>

<!DOCTYPE HTML >
<html lang="pl" lang="pl">
<head>
	<title>..::REJESTRACJA::..</title>
	<meta charset="uft-8" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<style>
		.error{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	
	</style>
	
	
</head>
<body>

	<form method="post">
		Login: <br /> <input type="text" name="newlogin"/> <br />
		
		<?php
			if(isset($_SESSION['e_newlogin'])) {
				echo '<div class="error">'.$_SESSION['e_newlogin'].'</div>';
				unset($_SESSION['e_newlogin']);	
			}
			
		?>
		
		Email: <br /> <input type="text" name="newemail"/> <br />
		
			<?php
			if(isset($_SESSION['e_newemail'])) {
				echo '<div class="error">'.$_SESSION['e_newemail'].'</div>';
				unset($_SESSION['e_newemail']);	
			}
		?>
		
		Haslo: <br /> <input type="password" name="newpassword1"/> <br />
		
		<?php
			if(isset($_SESSION['e_newpassword1'])) {
				echo '<div class="error">'.$_SESSION['e_newpassword1'].'</div>';
				unset($_SESSION['e_newpassword1']);	
			}
		?>
		
		Powtorz haslo: <br /> <input type="password" name="newpassword2" /> <br />

		<label><input type="checkbox" name="acceptance" /> Akceptuj regulamin </label> <br />
		
		<?php
			if(isset($_SESSION['e_acceptance'])) {
				echo '<div class="error">'.$_SESSION['e_acceptance'].'</div>';
				unset($_SESSION['e_acceptance']);	
			}
		?>

		
<!--		<div class="g-recaptcha" data-sitekey="6LchVh0TAAAAAFoBS7QgybyUGfm0PVHyPgT0Igdh"></div> -->
		
		<?php
//			if(isset($_SESSION['e_captcha_response'])) {
//				echo '<div class="error">'.$_SESSION['e_captcha_response'].'</div>';
//				unset($_SESSION['e_captcha_response']);	
//			}
		?>
		<input type="submit" value="Zarejestruj" />
		

		
	</form>


</body>
</html>