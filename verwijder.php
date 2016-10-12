<?php 
session_start();
require("conn.php");
require("include.php");

$logged_in = false;
if (empty($_SESSION['login_status'])) {
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;
}

if (isset($_GET['ID'])) {
	$ID = $_GET['ID'];
	try {
		$query = $conn->prepare("DELETE FROM spelers WHERE ID=:spelers_id");
		$data = array(":spelers_id" => $ID);
		$query->execute($data);
	header("location: spelers_tervant.php");
		
	} catch (Exception $e) {
		echo $e->getMessage();
	}

} else {
	echo "niet in orde";
}



 ?>