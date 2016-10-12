<?php 
session_start();
include "conn.php";
include "include.php";

$logged_in = false;
if (empty($_SESSION['login_status'])) {
	header("location: index.php");
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;
}

if ($logged_in == false) {
	header('location: index.php');
}

toon_header();

 ?>


<section class="main">
	<div>
		<h1>A.C. Tervant U10A</h1>
		
		<!-- navigatie toevoegen -->
	<?php include 'nav.php'; ?>
	
	</div>

<?php 	

$foutmeldingen = "";
$gegevensAanpassen = false;
$foutmeldingenBestaan = false;

// checken of de form knop is geklikt 
if (isset($_POST['wijzig'])) {	

	  if (empty($_POST['voornaam'])) {
	    $foutmeldingen['voornaam'] = "Vergeet voornaam niet!";
	  }

	  if (empty($_POST['achternaam'])) {
	    $foutmeldingen['achternaam'] = "Vergeet achternaam niet!";
	  }

	  if (empty($_POST['leeftijd'])) {
	    $foutmeldingen['leeftijd'] = "Vergeet leeftijd niet!";
	  }

	  if (empty($_POST['geboortedatum'])) {
	    $foutmeldingen['geboortedatum'] = "Vergeet geboortedatum niet!";
	  }

	  if (empty($_POST['contact'])) {
	    $foutmeldingen['contact'] = "Vergeet contact niet!";
	  }

	  if (empty($_POST['adres'])) {
	    $foutmeldingen['adres'] = "Vergeet adres niet!";
	  }

	  if (empty($_POST['geslacht'])) {
	    $foutmeldingen['geslacht'] = "Vergeet geslacht niet!";
	  }

	  if (empty($_POST['doelpunten'])) {
	    $foutmeldingen['doelpunten'] = "Vergeet doelpunten niet!";
	  }

	  if (empty($_POST['assist'])) {
	    $foutmeldingen['assist'] = "Vergeet assisten niet!";
	  }

	  if (empty($_POST['evaluatie'])) {
	    $foutmeldingen['evaluatie'] = "Vergeet evaluatie niet!";
	  }

	  if (empty($foutmeldingen)) {
	  		//  TO DO: foutmelding oplossen $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
	  		//  	   deze ligt hier onder  ergens 
	  	
		  	//  Alle info van de velden in een variabel stoppen
		  $nieuweSpelersGegevens['voornaam'] 		= $_POST['voornaam'];
		  $nieuweSpelersGegevens['achternaam'] 		= $_POST['achternaam'];
		  $nieuweSpelersGegevens['leeftijd'] 		= $_POST['leeftijd'];
		  $nieuweSpelersGegevens['geboortedatum'] 	= $_POST['geboortedatum'];
		  $nieuweSpelersGegevens['contact'] 		= $_POST['contact'];
		  $nieuweSpelersGegevens['adres'] 			= $_POST['adres'];
		  $nieuweSpelersGegevens['geslacht'] 		= $_POST['geslacht'];
		  $nieuweSpelersGegevens['doelpunten'] 		= $_POST['doelpunten'];
		  $nieuweSpelersGegevens['assist'] 			= $_POST['assist'];
		  $nieuweSpelersGegevens['evaluatie'] 		= $_POST['evaluatie'];
		  $nieuweSpelersGegevens['ID'] 				= $_GET['ID'];  
	 
	

		  // Proberen een geldige connectie te maken en een geldige sql query uit te voeren om gegevens te wijzigen
		  try {
		  
		  		// De query voorbereiden
				$query = $conn->prepare('UPDATE tervant_u10.spelers SET voornaam 		= :voornaam,
																		achternaam 		= :achternaam,
																		leeftijd 		= :leeftijd,
																		geboortedatum 	= :geboortedatum,
																		contact 		= :contact,
																		adres 			= :adres,
																		geslacht 		= :geslacht,
																		doelpunten 		= :doelpunten,
																		assist 			= :assist,
																		evaluatie 		= :evaluatie
									 	WHERE 							spelers.ID 		= :ID');
			

				// query uitvoeren
				$query->execute($nieuweSpelersGegevens);

		    	$gegevensAanpassen = true;

			
	 	} catch (Exception $e) {

	 	// Foutmeldingen opvangen en laten zien
		  	echo $e->getMessage(); 	
	 	} 
	} else {
	  		// Er zijn lege velden gevonden, doorsturen om opnieuw te proberen met ID nummer
			$foutmeldingenBestaan = true;
	  		$foutmeldingen = "Er is een fout opgelopen";
	  }
}


// Checken of de user id is meegegeven via de URL
if ($_GET['ID']) {
	// user id bestaat
	$userID = $_GET['ID'];
	// Geldige query opstarten
	$query = $conn->prepare('SELECT * FROM spelers WHERE ID=:id');
	// Query uitvoeren
	$query->execute(array(':id' => $userID));
	// Alles opvangen uit de DB
	$row = $query->fetch();
	// Alle resultaten in variabel stoppen
	$spelersID = $row['ID'];
	$errorWijzigSpeler = "";

} else {

		$errorWijzigSpeler = "<div class=\"errorWijzigSpeler\"<p>Er is technische probleem, de resultaat kon niet worden meegegeven. </p><br />
			  				  <p><a href=\"spelers_tervant.php\">Probeer opnieuw</a> of ga naar de <a href=\"index.php\">homepage</a></p></div>";
} 



?>

<form id="form_voeg_speler_toe" class="form" method="POST" action="">

		<div class="center">
			<?php if ($foutmeldingenBestaan == true) {echo $foutmeldingen;} ?>
				
			<h4>Voornaam</h4><p><input type="text" name="voornaam" value="<?php echo $row['voornaam'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['voornaam'];
			} ?></p>  -->

			<h4>Achternaam</h4><p><input type="text" name="achternaam" value="<?php echo $row['achternaam'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['achternaam'];
			} ?></p>  -->

			<h4>Leeftijd</h4><p><input type="text" name="leeftijd" value="<?php echo $row['leeftijd'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['leeftijd'];
			} ?></p>  -->

			<h4>Geboortedatum</h4><p><input type="text" name="geboortedatum" value="<?php echo $row['geboortedatum'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['geboortedatum'];
			} ?></p>  -->

			<h4>Contact</h4><p><input type="text" name="contact" value="<?php echo $row['contact'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['contact'];
			} ?></p>  -->

			<h4>adres</h4><p><input type="text" name="adres" value="adres" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['adres'];
			} ?></p>  -->


			<h4>Geslacht</h4><p><input type="text" name="geslacht" value="<?php echo $row['geslacht'] ?>" placeholder=""></p>
			 
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['geslacht'];
			} ?></p>  -->

			<h4>Doelpunten</h4><p><input type="text" name="doelpunten" value="<?php echo $row['doelpunten'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['doelpunten'];
			} ?></p>  -->

			<h4>Assist</h4><p><input type="text" name="assist" value="<?php echo $row['assist'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['assist'];
			} ?></p>  -->

			<h4>Evaluatie</h4><p><input type="text" name="evaluatie" value="<?php echo $row['evaluatie'] ?>" placeholder=""> </p>
			<!-- <p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['evaluatie'];
			} ?></p>  -->

		</div>

		<div class="center">
			<p class="submit"><input id="voeg_speler_toe_submit" type="submit" name="wijzig" value="Wijzig gegevens"></p>
		</div>
		<div class="center">
			
			<?php
				// Als de error bestaat, laat deze dan zien 
				if (isset($errorWijzigSpeler)) {
				echo $errorWijzigSpeler;
			} ?>

		</div>
	</form>

</section>
 <?php 

toon_footer();

  ?>