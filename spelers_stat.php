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
		<h2 class="center">Spelers U10A statistieken</h2>
		<div class="innerContainers">
			<table class="table">
				<tr class="table_row center">
					<th class="table_head center">Speler</th>
					<th class="table_head center">Doelpunten</th>
					<th class="table_head center">Assisten</th>
				</tr>
				
				<?php 

				 	$query = $conn->query('SELECT * FROM spelers ORDER BY doelpunten DESC'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'spelerStatistieken');
		      	 	while ($row = $query->fetch()) {
		      		 echo $row->speler_statistieken;
		         	}
		    	?>
			</table>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>