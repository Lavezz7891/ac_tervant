<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "tervant_u10";


// maak de connectie met de voornoemde database
	try
	{
		// maak een instantie van het php data object 
		$conn = new PDO("mysql:host=$servername;dbname=$db",
                $username,
                $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOExeption $e)
	{
		echo'Fout bij het connecteren van de database';
		echo'Fout bij het maken van een DB connectie, probeer later opnieuw. \ Fout: '.$e->getMessage();
		
	}


?>