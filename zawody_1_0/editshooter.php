<?php
require "connection.php";
$result = $mysqli->query("select * from shooter");
$count = mysqli_num_rows($result);
//$row = $result->fetch_assoc();

while ($row = $result->fetch_assoc()) {
	
	if ($row[Club] =='') $row[Club]="Brak";
	if ($row[IsLicence]==0) $row[IsLicence]="Brak";

$readonly="disabled";
echo $row[ID];
echo ' <a href="?action=edytuj&amp;id='.$row[ID].'">Edytuj</a><br/>';		


if ($_GET['action'] == "edytuj"){
	$id =$_GET['id'] ;
	$result = $mysqli->query("SELECT * FROM shooter WHERE ID = '$id' LIMIT 1");
	$row = $result->fetch_assoc();
	unset($readonly);
}
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
echo '<a href="?action=zapisz&amp;id='.$row[ID].'">Zapisz</a><br>';
echo "<br />";
echo "</form>";
}


  
?>