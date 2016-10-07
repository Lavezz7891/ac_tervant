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
?>

<?php toon_header()  ?>

<body>
<section class="main">
	<div>
		<h1>A.C. Tervant U10A</h1>
		<div class="header">
		<?php 

			if ($logged_in == false) {
				echo "<div class=\"menu_logged_in\">";
			}else {
				echo "<div class=\"menu\">";
			}

	 	?>
			<!-- <div class="menu"> -->
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
		<h2 class="center">Wedstrijd verslagen</h2>
		<?php 
			if (isset($user_voornaam)) {
				echo "<div class=\"nieuw_verslag center\">
				       <div class=\"nieuw_verslag_button\"><a href=\"voeg_verslag_toe.php\">Nieuwe wedstrijdverslag</a>
				       </div>
			         </div>";
			}
		?>
		
		<div class="innerContainers">
				<!-- <?php 
					// $verslag = new verslag('dokenkcdkcvkv kd vpk vkpdc pkc ');	
					// echo $verslag->wedstrijd__verslag;

					$query = $conn->query('SELECT * FROM `wedstrijdverslagen`'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'verslag');
		      	 	while ($row = $query->fetch()) {
		      	 		if (isset($row)) {
		      	 			$verslag = $row->wedstrijdverslag;
		      	 			$korte_verslag = (strlen($verslag) > 0) ? substr($verslag,0,100).'...' : $verslag;	
		      	 			echo "$korte_verslag <a href=\"spelers_tervant.php\">Lees meer</a> </br>";
		      	 		}
		      			 
		         	}
				 ?> -->
			
				<?php 
		      	 	

				 	$query = $conn->query('SELECT * FROM `wedstrijdverslagen` ORDER BY datum ASC'); 
			     	$query->setFetchMode(PDO::FETCH_CLASS, 'wedstrijdVerslagen');
		      	 	while ($row = $query->fetch()) {
		      			echo $row->wedstrijdverslag;

		         	}


		        ?>
		</div>
	</div>
</section>

<?php toon_footer() ?>
 
