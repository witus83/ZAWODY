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
    <title>..::ZAWODY::..</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
require "connection.php";
$result = $mysqli->query("select * from shooter");
$count = mysqli_num_rows($result);
//$row = $result->fetch_assoc();

echo '<div class="row">';
echo '<div class="col-md-6">';
echo '<table class="table table-striped">';
echo "<thead>";
echo "<tr>";
echo "<th>LP</th>";
echo "<th>Imię</th>";
echo "<th>Nazwisko</th>";	
echo "<th>Miasto</th>";
echo "<th>Klub</th>";
echo "<th>Licencja</th>";
echo "<th>Data urodzenia</th>";
echo "<th>Email</th>";
echo "<th>Telefon</th>";
echo "<th>Uwagi</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
 
 while ( $row = $result->fetch_assoc() ) {
	 
	if ($row[Club] =='') $row[Club]="Brak";
	if ($row[IsLicence]==0) $row[IsLicence]="Brak";
	
echo "<tr>";
echo "<td>".$row[ID]."</td>";
echo "<td>".$row[FirstName]."</td>";
echo "<td>".$row[LastName]."</td>";
echo "<td>".$row[City]."</td>";
echo "<td>".$row[Club]."</td>";
echo "<td>".$row[IsLicence]."</td>";
echo "<td>".$row[BirthDate]."</td>";
echo "<td>".$row[Email]."</td>";
echo "<td>".$row[Phone]."</td>";
echo "<td>".$row[Notes]."</td>";
echo '<td><a href="?action=edytuj&amp;ID='.$row[ID].'">Edytuj</a><br/></td>';
echo '<td><a href="?action=delete&amp;ID='.$row[ID].'">Usuń</a><br/></td>';

echo "</tr>";

 }
 echo "
            </tbody>
          </table>
		  </div>
		  </div>";

if ($_GET['action'] == "edytuj"){
		$id = $_GET[ID];
		$result = $mysqli->query("SELECT * FROM shooter WHERE ID = '$id' LIMIT 1");
		$row = $result->fetch_assoc();

		
echo "<br />";
echo '<form method="post">';
echo 'Imie: <input type="text" value="'.$row[FirstName].'"'.$readonly.'/> ';
echo 'Nazwisko: <input type="text" value="'.$row[LastName].'"'.$readonly.'/> ';
echo 'Miasto: <input type="text" value="'.$row[City].'"'.$readonly.'/> ';
echo 'Klub: <input type="text" value="'.$row[Club].'"'.$readonly.'/> ';
echo "<br />";
echo 'Czy posiada licencje: <input type="text" value="'.$row[IsLicence].'"'.$readonly.'/> ';
echo 'Data urodzenia: <input type="text" value="'.$row[BirthDate].'"'.$readonly.'/> ';
echo 'Email: <input type="text" value="'.$row[Email].'"'.$readonly.'/> ';
echo 'Telefon: <input type="text" value="'.$row[Phone].'"'.$readonly.'/> ';
echo "<br />";
echo 'Uwagi: <textarea name="notes" placeholder="Uwagi" id="textarea" rows="4" cols="50"'.$readonly.'>'.$row[notes].'</textarea> ';
echo '<a href="?action=zapisz&amp;ID='.$row[ID].'">Zapisz</a><br>';
echo "<br />";
echo "</form>";		
	
		}

		  
		  
?>