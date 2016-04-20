<?php
session_start();

	if(!isset($_SESSION['logged'])) {	
		header('Location: index.php');
		exit();		
	}
		
?>

<!DOCTYPE html>
<html lang="pl">
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
	  
	  <h2>Wyszukaj STRZELCA</h2>
    <form method="post">
      Wyszukaj według:
      <select name="method">
       <option value="LastName"/>Nazwisko
       <option value="City"/>Miasto
       <option value="Email"/>Email
      </select>
      <br /><br />
      Szukane wyrażenie:
      <input type="text" name="search_text" />
      <input type="submit" name="wyszukaj" />
    </form>
	<br/>
  </body>
</html>

<?php
require "functions.php";

if ($_POST!=null){
	
	$method = $_POST['method'];
	$search_text = $_POST['search_text'];
	$search_text = trim($search_text);
    
	if (!get_magic_quotes_gpc())
      {
        $metod = addslashes($method);
        $search_text = addslashes($search_text);
       }
	require_once "connection.php";
	$sql="select * from SHOOTER where ".$method. " like '%".$search_text."%'";
	$result = $mysqli->query($sql);
//	echo $sql;
//	echo "<br />";
//	echo ($result->num_rows);

	if (($result->num_rows)==0) {
		echo "Brak wyników wyszukiwania!!";	
	}
		
	search_shooter($result);
	$mysqli->close;

} elseif (empty($_GET)){
	show_header();

}else 
	switch($_GET['action']){
		
		case 'edit': 
//			require_once "functions.php";
			show_header();
			view_shooter($_GET['ID']);
			break;
			
		case 'save':
			show_header();
			echo $_GET[ID];
			break;
	}


// elseif ($_GET['action']='edit'){

	// require_once "functions.php";
	// show_header();
	// view_shooter($_GET['ID']);

// } if($_GET['action']='save'){
	
	// echo $_GET[ID];
	
	
// }


?>