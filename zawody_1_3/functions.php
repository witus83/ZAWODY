<?php

//$newpassword1=admin;
//$newpassword1 = password_hash($newpassword1, PASSWORD_DEFAULT);

//echo $newpassword1;


function show_header(){
	
	echo '<div class="row">';
	echo '<div class="col-md-6">';
	echo '<table class="table table-striped">';
	echo "<thead>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Imię</th>";
	echo "<th>Nazwisko</th>";	
	echo "<th>Miasto</th>";
	echo "<th>Klub</th>";
	echo "<th>Licencja</th>";
	echo "<th>Numer Licencji</th>";
	echo "<th>Email</th>";
	echo "<th>Telefon</th>";
	echo "<th>Uwagi</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

}

function view_shooter($ID){
	
	require "connection.php";
	$sql="SELECT * FROM SHOOTER WHERE ID = $ID LIMIT 1";
	$result = $mysqli->query($sql);	
//	while ($row = $result->fetch_assoc() ) {
	$row = $result->fetch_assoc();
	if ($row[Club] =='') $row[Club]="Brak";
	if ($row[IsLicence]==0) $row[IsLicence]==false;		

	echo "<tr>";
	echo "<td>".$row[ID]." </td>";
	echo "<td>".$row[FirstName]." </td>";
	echo "<td>".$row[LastName]."</td>";
	echo "<td>".$row[City]."</td>";
	echo "<td>".$row[Club]."</td>";
	echo "<td>".$row[IsLicence]."</td>";
	echo "<td>".$row[LicenceNr]."</td>";
	echo "<td>".$row[Email]."</td>";
	echo "<td>".$row[Phone]."</td>";
	echo "<td>".$row[Notes]."</td>";
	echo '<td><a href="?action=edytuj&amp;ID='.$row[ID].'">Edytuj</a><br/></td>';
	echo '<td><a href="?action=delete&amp;ID='.$row[ID].'">Usuń</a><br/></td>';
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	echo "</div>";	
	echo "<br/>";
	echo '<form method="post">';
	echo 'Imie: <input type="text" value="'.$row[FirstName].'"'.$readonly.'/> ';
	echo 'Nazwisko: <input type="text" value="'.$row[LastName].'"'.$readonly.'/> ';
	echo 'Miasto: <input type="text" value="'.$row[City].'"'.$readonly.'/> ';
	echo 'Klub: <input type="text" value="'.$row[Club].'"'.$readonly.'/> ';
	echo "<br />";
	echo 'Czy posiada licencje: <input type="text" value="'.$row[IsLicence].'"'.$readonly.'/> ';
	echo 'Numer Licencji: <input type="text" value="'.$row[LicenceNr].'"'.$readonly.'/> ';
	echo 'Email: <input type="text" value="'.$row[Email].'"'.$readonly.'/> ';
	echo 'Telefon: <input type="text" value="'.$row[Phone].'"'.$readonly.'/> ';
	echo "<br />";
	echo 'Uwagi: <textarea name="notes" placeholder="Uwagi" id="textarea" rows="4" cols="50"'.$readonly.'>'.$row[Notes].'</textarea> ';
	echo '<a href="?action=save&amp;ID='.$row[ID].'">Zapisz</a><br>';
	echo "<br />";
	echo "</form>";
	
//	}
	
}


function search_shooter ($result){
	
	show_header();
	
	while ($row = $result->fetch_assoc()){
		
	if ($row[Club] =='') $row[Club]="Brak";
	if ($row[IsLicence]==0) $row[IsLicence]==false;		

	echo "<tr>";
	echo "<td>".$row[ID]." </td>";
	echo "<td>".$row[FirstName]." </td>";
	echo "<td>".$row[LastName]."</td>";
	echo "<td>".$row[City]."</td>";
	echo "<td>".$row[Club]."</td>";
	echo "<td>".$row[IsLicence]."</td>";
	echo "<td>".$row[LicenceNr]."</td>";
	echo "<td>".$row[Email]."</td>";
	echo "<td>".$row[Phone]."</td>";
	echo "<td>".$row[Notes]."</td>";
	echo '<td><a href="?action=edit&amp;ID='.$row[ID].'">Edytuj</a><br/></td>';
	echo '<td><a href="?action=delete&amp;ID='.$row[ID].'">Usuń</a><br/></td>';
	echo "</tr>";

	// $mysqli->close;
	}	
	
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	echo "</div>";
	
}

function update_shooter($ID,$FistName,$LastName,$City,$Club,$IsLicence,$LicenceNr,$Email,$Phone,$Notes){
	//require "connection.php";
	//$sql="update SHOOTER set FirstName=''";
	

	
}


?>