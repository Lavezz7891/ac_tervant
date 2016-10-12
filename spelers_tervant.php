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

toon_header() 

?>

<body>
<section class="main">
	<h1>A.C. Tervant U10A</h1>
	
	<!-- navigatie toevoegen -->
	<?php include 'nav.php'; ?>

	</div>
	<div class="inner-body">
		<h2 class="center">Spelers U10A</h2>
		<div class="innerContainers">
			<table class="table">
				<tr class="table_row center">
					<th class="col-md-2 table_head center">Naam</th>
					<th class="col-md-2 table_head center">Geboortedatum</th>
					<th class="col-md-2 table_head center">Contact</th>
				</tr>
				<?php 

				 	$query = $conn->query('SELECT * FROM spelers'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'gegevensOphalen');
		      	 	while ($row = $query->fetch()) {
		      		 echo $row->spelersInfo;
		         	
		         	}

		    	?>
		    </table>
		    <div class="nieuwe_speler_wrapper">
			<?php 
				if ($logged_in == true) {
					echo "<div class=\"nieuw_speler center\">
					       <div class=\"nieuw_speler_button\"><a href=\"voeg_speler_toe.php\">Voeg speler toe</a>
					       </div>
				         </div>";
				}
			?>
		</div>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>

