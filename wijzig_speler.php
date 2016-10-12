<?php 
session_start();
include "include.php";
include "conn.php";

$logged_in = false;
if (empty($_SESSION['login_status'])) {
	header("location: index.php");
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;
}


toon_header();

 ?>


<section class="main">
	<div>
		<h1>A.C. Tervant U10A</h1>
		
		<!-- navigatie toevoegen -->
	<?php include 'nav.php'; ?>
	
	</div>

	<div class="ingvevulde_doelpunten_speler center">
		<?php 
				// $query = $conn->query('SELECT * FROM `spelers` WHERE voornaam=$user_voornaam'); 
			 //     	$query->setFetchMode(PDO::FETCH_CLASS, 'spelersDoelpunten');
		  //     	 	while ($row = $query->fetch()) {
		  //     			echo $row->spelersDoelpunten_assist;

		  //        	}
		 ?>
	</div>

<?php 	

	
$gegevensAanpassen = false;

// checken of de form knop is geklikt 
if (isset($_POST['wijzig'])) {	

	  //  Alle info van de velden in een variabel stoppen
	  $nieuweSpelersDoelpunten = $_POST['spelersDoelpunten'];
	  $nieuweSpelersAssist = $_POST['spelersAssist']; 
	  $userIdPost = $_GET['id'];

	  // Checken of de velden niet leeg zijn
	  if (!empty($nieuweSpelersDoelpunten) && !empty($nieuweSpelersAssist) && !empty($userIdPost)) {


	  // Proberen een geldige connectie te maken en een geldige sql query uit te voeren om gegevens te wijzigen
	  try {
		  	if (!empty($userIdPost)) {
		  		// De query voorbereiden
				$query = $conn->prepare('UPDATE `tervant_u10`.`spelers` SET `doelpunten` = :nieuweSpelersDoelpunten,
																			`assist` = :nieuweSpelersAssist,
										 WHERE 								`spelers`.`ID` = :userIdPost');
				// query uitvoeren
				$query->execute(array(':nieuweSpelersDoelpunten' => $nieuweSpelersDoelpunten,
									  ':nieuweSpelersAssist'     => $nieuweSpelersAssist,
									  ':userIdPost'              => $userIdPost));
		  	}
		    $gegevensAanpassen = true;
	 	} catch (Exception $e) {
	 	// Foutmeldingen opvangen en laten zien
	  	echo $e->getMessage(); 	
	 	} 
	  } else {
	  	// Er zijn lege velden gevonden, doorsturen om opnieuw te proberen met ID nummer
	  		  $userIdPost = $_GET['id'];
	  		  echo $userIdPost;

	  }
} 


// Checken of de user id is meegegeven via de URL
if ($_GET['id']) {
	// user id bestaat
	$userID = $_GET['id'];
	// Geldige query opstarten
	$query = $conn->prepare('SELECT * FROM spelers WHERE ID=:id');
	// Query uitvoeren
	$query->execute(array(':id' => $userID));
	// Alles opvangen uit de DB
	$row = $query->fetch();
	// Alle resultaten in variabel stoppen
	$spelersID = $row['ID'];
	$spelersDoelpunten = $row['doelpunten'];
	$spelersAssist = $row['assist'];
	$errorWijzigSpeler = "";


} else {

		$errorWijzigSpeler = "<div class=\"errorWijzigSpeler\"<p>Er is technische probleem, de resultaat kon niet worden meegegeven. </p><br />
			  				  <p><a href=\"spelers_stat.php\">Probeer opnieuw</a> of ga naar de <a href=\"index.php\">homepage</a></p></div>";
	
} 



?>

<form class="form" method="post" action="">
	<h2 class="center">
		Wijzig gegevens
	</h2>
	<div class="center">
		<?php
			// Als de error bestaat, laat deze dan zien 
			if (isset($errorWijzigSpeler)) {
			echo $errorWijzigSpeler;
		} ?>
		<label>doelpunten</label>
		<p><input type="text" name="spelersDoelpunten" value="<?php echo $spelersDoelpunten; ?>"/> </p>
		<label>assisten</label>
		<p><input type="text" name="spelersAssist" value="<?php echo $spelersAssist; ?>"/></p>
		<p><input type="hidden" name="spelers_id" value="<?php echo $spelersID; ?>" ></p>
	 	<p class="submit"><input type="submit" id="submit" name="wijzig" value="WIJZIG"/></p>
	 	<?php 

	 		if ($gegevensAanpassen == true) {
	 			echo "Gegevens zijn aangepast, <a class=\"gaTerug\" href=\"spelers_stat.php\">ga terug</a>";
	 		}

	 	 ?>
	</div>
</form>


 <?php 

toon_footer();

  ?>