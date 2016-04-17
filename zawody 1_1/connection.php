<?php

    $mysql_server = "localhost";
    $mysql_admin = "witus83_zawody";
	$mysql_pass = "5vi2JJhd";
    $mysql_db = "witus83_ZAWODY";
	$mysqli = @new mysqli($mysql_server, $mysql_admin, $mysql_pass, $mysql_db);
//	$mysqli = mysqli_connect($mysql_server, $mysql_admin, $mysql_pass, $mysql_db);
	mysqli_report(MYSQLI_REPORT_STRICT);
//	$mysqli->set_charset("utf8");
	$mysqli->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
	
	
	try {

		if($mysqli->connect_errno!=0){
				
				throw new Exception($mysqli->connect_errno);		
			}
			
	}
	catch(Exception $e) {
			
			echo "PRZEPRASZAMY!!";
	//		echo '<br /> Info diagnostyczne:'.$e;
	}	
		
		    
?>