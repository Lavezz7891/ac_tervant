<?php 
include 'conn.php';
include 'include.php';
?>

<?php toon_header()  ?>

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

		<div class="login center">
				<ul><li><a href="login.php">Login</a></li></ul>
		</div>
	</div>
	<div class="inner-body">
		<h2 class="center">Wedstrijd verslagen</h2>
		<div class="nieuw_verslag center"><div class="nieuw_verslag_button"><a href="">Nieuwe wedstrijdverslag</a></div></div>
		<div class="innerContainers">
			
				<?php 

				 	$query = $conn->query('SELECT * FROM `wedstrijdverslagen`'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'wedstrijdVerslagen');
		      	 	while ($row = $query->fetch()) {
		      			echo $row->wedstrijdverslag;
		         	}
		        ?>
	
		</div>
	</div>
</section>

<?php toon_footer() ?>
 
