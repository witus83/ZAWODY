<?php 
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
	header('Location: index.php');
	exit();
}


require "connection.php";

	if($mysqli->connect_errno!=0){
		
		echo "Brak połączenia z bazą danych";
		
	} else {
		
		$login = $_POST['login'];
		$login = htmlentities($login,ENT_QUOTES,"UTF-8");
		//$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
//		$password = htmlentities($password,ENT_QUOTES,"UTF-8");
		

		
		if($result = @$mysqli->query(sprintf("SELECT * FROM USER where LOGIN = '%s'",
		mysqli_real_escape_string($mysqli,$login)
//		mysqli_real_escape_string($mysqli,$password))
		))) {
			
			$user_count = $result->num_rows;
			if($user_count == 1){
				
				$row = $result->fetch_assoc();

				if(password_verify($_POST['password'], $row['Password'])) {	
				
					$_SESSION['logged'] = true;
					$_SESSION['user'] = $row['Login'];
					$_SESSION['id'] = '$row[ID]';
					unset($_SESSION['login_error']);
					$result->free();
					header('Location:mainpage.php');					
				}
				else {
					$_SESSION['login_error'] = '<span style="color:red">Nieprawidlowy login/haslo!</span>';
					header('Location:index.php');
				}
				
			} else {
				$_SESSION['login_error'] = '<span style="color:red">Nieprawidlowy login/haslo!</span>';
				header('Location:index.php');
			}
			
		}
				
	$mysqli->close();
	}
?>