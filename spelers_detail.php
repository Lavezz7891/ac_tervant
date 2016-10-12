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
toon_header();

?>

<body>
<section class="main">
	<h1>A.C. Tervant U10A</h1>
	
	<!-- navigatie toevoegen -->
	<?php include 'nav.php'; ?>

	</div>
	<div class="inner-body">
		<h2 class="center">Spelers U10A detail</h2>
		<div class="innerContainers">
			<table class="table container">
				<tr class="table_row center">
					<th class="table_head center">Naam</th>
					<th class="table_head center">Geboortedatum</th>
					<th class="table_head center">Contact</th>
					<th class="table_head center">Adres</th>
					<th class="table_head center">Geslacht</th>
					<th class="table_head center">Evaluatie</th>
					<?php 

					if ($logged_in == true) {
						echo "<th class=\"table_head center\" colspan=\"2\">Admin</th>";
					}

					 ?>
				</tr>
				<?php 
							
					try {

						if (!empty($_GET['ID'])) {
							$speler_id = $_GET['ID'];
							// query voorbereiden 
							$query = $conn->prepare('SELECT * FROM spelers WHERE spelers.ID = :speler_id'); 
							// :speler_id koppelen met de variabel
							$data = array(':speler_id' => $speler_id);
							// query met de koppeling uitvoeren
                      		$query->execute($data); 
                      		// resultaten opvragen en koppelen met een class
					     	$query->setFetchMode(PDO::FETCH_CLASS, 'spelersDetail');
				      	 	while ($row = $query->fetch()) {
				      		 echo $row->spelers_detail;
				         	}
						}
						
					} catch (Exception $e) {
						echo $e->getMessage();
					}

				 	
		    	?>
		    </table>
		    <div class="terug_knop">
		    	<p><a href="spelers_tervant.php" class="center">Terug</a></p>
		    </div>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>

