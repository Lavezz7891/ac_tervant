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