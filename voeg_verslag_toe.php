<?php 
session_start();
include 'conn.php';
include 'include.php';

$logged_in = false;
if (empty($_SESSION['login_status'])) {
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;
}

if (isset($_POST['voeg_toe'])) {

	if (empty($_POST['titel'])) {
    $foutmeldingen['titel'] = "Vergeet wedstrijd titel niet!";
  }

  if (empty($_POST['datum'])) {
    $foutmeldingen['datum'] = "Vergeet wedstrijd datum niet!";
  }

  if (empty($_POST['wedstrijdverslag'])) {
    $foutmeldingen['wedstrijdverslag'] = "Vergeet wedstrijdverslag niet!";
  }

  if (empty($foutmeldingen)) {
  	$i= 0;
  	$verslag['id'] = $i++;
	$verslag['titel'] = $_POST['titel'];
	$verslag['datum'] = $_POST['datum'];
	$verslag['wedstrijdverslag'] = $_POST['wedstrijdverslag'];
	// query gereedmaken
	$query = "INSERT INTO `wedstrijdverslagen`(`id`, `titel`, `datum`, `wedstrijdverslag`) VALUES (:id,:titel,:datum,:wedstrijdverslag)";
    
    $result = $conn->prepare($query);
        
	try {
		$result->bindValue(':verslag_titel', $verslag['titel']);
		$result->bindValue(':verslag_datum', $verslag['datum']);
		$result->bindValue(':verslag_wedstrijdverslag', $verslag['wedstrijdverslag']);
		$result->execute($verslag);

		header("location: index.php");
	} catch (Exception $e) {
		echo $e->getMessage() . ' <br> ' . $e;
	}
	    
  }  	
 
  
}


?>



<?php
toon_header();
?>

<section class="main">
	<h1>A.C. Tervant U10A</h1>
	<div>

	<!-- navigatie toevoegen -->
	<?php include 'nav.php'; ?>
		
	</div>

	<h2 class="center">Voeg verslag toe</h2>

	<form id="form" class="form" method="post" action="">

		<div class="center">

			<h4>Wedstrijd</h4><p><input type="text" name="titel" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['titel'];
			} ?></p>

			<h4>Datum	</h4><p><input type="text" name="datum" value="" placeholder=""></p>
			<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
				echo $foutmeldingen['datum'];
			} ?></p>

		</div>

		<h4 class="center">Wedstrijdverslag</h4>	
		<p class="textarea"><textarea id="textarea" name="wedstrijdverslag" value="" placeholder="Typ je verslag hier.."></textarea></p>
		<p class="wedstrijd_toevoegen"><?php if (isset($foutmeldingen)) {
			echo $foutmeldingen['wedstrijdverslag'];
		} ?></p>
		<div class="center">
			<p class="submit"><input type="submit" name="voeg_toe" value="Voeg toe"></p>
		</div>
	</form>
</section>



 <?php 
 toon_footer();
  ?>