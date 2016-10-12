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
		<h2 class="center">Spelers U10A doelpuntensaldo</h2>
		<div class="innerContainers">
			<table class="table">
				<tr class="table_row center">
					<th class="table_head center">Doelpunten tegen</th>
					<th class="table_head center">Doelpunten gemaakt</th>
				</tr>
				<?php 

				 	$query = $conn->query('SELECT * FROM ploeg_doelpunten'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'ploegDoelpunten');
		      	 	while ($row = $query->fetch()) {
		      		 echo $row->ploeg_doelpunten, '<br>';
		         	}
		    	?>
			</table>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>