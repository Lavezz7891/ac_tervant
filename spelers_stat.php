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
		<p>Spelers statistieken</p>
		<div class="innerContainers">
			<table class="table">
				<?php 

				 	$query = $conn->query('SELECT * FROM speler_statistieken'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'spelerStatistieken');
		      	 	while ($row = $query->fetch()) {
		      		 echo $row->speler_statistieken, '<br>';
		         	}
		    	?>
			</table>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>