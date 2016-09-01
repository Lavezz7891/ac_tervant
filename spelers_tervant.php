<?php 
include 'conn.php';
include 'include.php';
 

toon_header() 

?>

<body>
<section class="main">
	<h1>A.C. Tervant U10A</h1>
	<div class="header">
		<div class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="spelers_tervant.php">Spelers</a></li>
				<li><a href="spelers_stat.php">Spelers statistieken</a></li>
				<li><a href="ploeg_doelsaldo.php">Ploeg doelpunten</a></li>
		</ul>
		</div>
	</div>
	<div class="inner-body">
		<h2 class="center">Spelers U10A</h2>
		<div class="innerContainers">
			<table class="col-md-push-3 col-md-8 table">
				<tr class="table_row center">
					<th class="col-md-2 table_head center">Naam</th>
					<th class="col-md-2 table_head center">Geboortedatum</th>
					<th class="col-md-2 table_head center">Contact</th>
				</tr>
				<?php 

				 	$query = $conn->query('SELECT * FROM spelers'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'gegevensOphalen');
		      	 	while ($row = $query->fetch()) {
		      		 echo $row->spelersInfo, '<br>';
		         	}
		    	?>
		    </table>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>

