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
	<div class="header">
		<?php 

		if ($logged_in == false) {
			echo "<div class=\"menu_logged_in\">";
		}else {
			echo "<div class=\"menu\">";
		}

	 ?>
			<ul>
			    <li><a href="index.php">Home</a></li>
				<li><a href="spelers_tervant.php">Spelers</a></li>
				<?php 
					if ($logged_in == true && isset($user_voornaam)) {
					echo "<li><a href=\"spelers_stat.php\">Spelers statistieken</a></li>";
					}
				 ?>	
				<li><a href="ploeg_doelsaldo.php">Ploeg doelpunten</a></li>
		    </ul>
		</div>
		<div class="login center">
			<?php 
				if ($logged_in == true) {
					echo "Hallo " . $user_voornaam;
					echo "<ul><li><a href=\"logout.php\">Logout</a></li></ul>";
				} else {
					echo "<ul><li><a href=\"login.php\">Login</a></li></ul>";
				}
			 ?>
				
		</div>
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

