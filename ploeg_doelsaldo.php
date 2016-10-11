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
					echo "<ul><li class=\"logout\"><a href=\"logout.php\">Logout</a></li></ul>";
				} else {
					echo "<ul><li><a href=\"login.php\">Login</a></li></ul>";
				}
			 ?>
				
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