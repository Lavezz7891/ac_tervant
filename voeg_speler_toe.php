<?php 
session_start();
include 'conn.php';
include 'include.php';
 
$logged_in = false;
if (empty($_SESSION['login_status'])) {
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;


if (isset($_POST['voeg_toe'])) {
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

  if (empty($_POST['assisten'])) {
    $foutmeldingen['assisten'] = "Vergeet assisten niet!";
  }

  if (empty($_POST['evaluatie'])) {
    $foutmeldingen['evaluatie'] = "Vergeet evaluatie niet!";
  }

  if (empty($foutmeldingen)) {
  	$i = 0;
  	$nieuwSpeler['voornaam'] = $_POST['voornaam'];
  	$nieuwSpeler['achternaam'] = $_POST['achternaam'];
  	$nieuwSpeler['leeftijd'] = $_POST['leeftijd'];
  	$nieuwSpeler['geboortedatum'] = $_POST['geboortedatum'];
  	$nieuwSpeler['contact'] = $_POST['contact'];
  	$nieuwSpeler['adres'] = $_POST['adres'];
  	$nieuwSpeler['geslacht'] = $_POST['geslacht'];
  	$nieuwSpeler['doelpunten'] = $_POST['doelpunten'];
  	$nieuwSpeler['assisten'] = $_POST['assisten'];
  	$nieuwSpeler['evaluatie'] = $_POST['evaluatie'];


    try {

    $query = 	"INSERT INTO `spelers`
    						 (`voornaam`, 
    						 `achternaam`, 
    						 `leeftijd`, 
    						 `geboortedatum`,
    						 `contact`, `adres`, 
    						 `geslacht`, 
    						 `doelpunten`,
    						 `assist`, 
    						 `evaluatie`) 
    				VALUES  (  :voornaam,
	  			   			   :achternaam,
	  			   			   :leeftijd,
	  			   			   :geboortedatum,
	  			   			   :contact,
	  			   			   :adres,
	  			   			   :geslacht,
	  			   			   :doelpunten,
	  			   			   :assisten,
	  			   			   :evaluatie)";


	    $query_ready = $conn->prepare($query);
	    
    	$result = array(':voornaam'		=> $nieuwSpeler['voornaam'],
						':achternaam'	=> $nieuwSpeler['achternaam'],
						':leeftijd'		=> $nieuwSpeler['leeftijd'],
						':geboortedatum'=> $nieuwSpeler['geboortedatum'],
						':contact'		=> $nieuwSpeler['contact'],
						':adres'		=> $nieuwSpeler['adres'],
						':geslacht'		=> $nieuwSpeler['geslacht'],
						':doelpunten'	=> $nieuwSpeler['doelpunten'],
						':assisten'		=> $nieuwSpeler['assisten'],
						':evaluatie'	=> $nieuwSpeler['evaluatie']);


    	//  query uitvoeren
    	$query_ready->execute($result);
    	// na het succesvol uitvoeren van de query de gebruiken redirecten
    	header("location: spelers_tervant.php");
    } catch (Exception $e) {
    	echo $e->getMessage();
    	echo "Er is iets misgelopen bij het toevoegen van de speler";
    }
  }
}


}
toon_header(); ?>
<section class="main">
	<h1>A.C. Tervant U10A</h1>
<div>
<?php include 'nav.php'; ?>
</div>






<form id="form_voeg_speler_toe" class="form" method="post" action="">

		<div class="center">

			<h4>Voornaam</h4><p><input type="text" name="voornaam" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['voornaam'];
			} ?></p>

			<h4>Achternaam</h4><p><input type="text" name="achternaam" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['achternaam'];
			} ?></p>

			<h4>Leeftijd</h4><p><input type="text" name="leeftijd" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['leeftijd'];
			} ?></p>

			<h4>Geboortedatum</h4><p><input type="text" name="geboortedatum" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['geboortedatum'];
			} ?></p>

			<h4>Contact</h4><p><input type="text" name="contact" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['contact'];
			} ?></p>

			<h4>adres</h4><p><input type="text" name="adres" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['adres'];
			} ?></p>


			<h4>Geslacht</h4><p><input type="radio" name="geslacht" value="man" placeholder="">man</p>
			<p><input type="radio" name="geslacht" value="vrouw" >vrouw</p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['geslacht'];
			} ?></p>

			<h4>Doelpunten</h4><p><input type="text" name="doelpunten" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['doelpunten'];
			} ?></p>

			<h4>Assisten</h4><p><input type="text" name="assisten" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['assisten'];
			} ?></p>

			<h4>Evaluatie</h4><p><input type="text" name="evaluatie" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['evaluatie'];
			} ?></p>

		</div>

		<div class="center">
			<p class="submit"><input id="voeg_speler_toe_submit" type="submit" name="voeg_toe" value="Voeg toe"></p>
		</div>
	</form>

</section>

<?php toon_footer() ?>
