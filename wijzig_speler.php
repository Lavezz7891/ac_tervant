<?php 
session_start();
include "include.php";
include "conn.php";

$logged_in = false;
if (empty($_SESSION['login_status'])) {
	header("location: index.php");
}elseif ($_SESSION['login_status'] == true) {
	$user_voornaam =  $_SESSION['user_voornaam'];
	$logged_in = true;
}


toon_header();

 ?>


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

	<div class="ingvevulde_doelpunten_speler center">
		<?php 
				// $query = $conn->query('SELECT * FROM `spelers` WHERE voornaam=$user_voornaam'); 
			 //     	$query->setFetchMode(PDO::FETCH_CLASS, 'spelersDoelpunten');
		  //     	 	while ($row = $query->fetch()) {
		  //     			echo $row->spelersDoelpunten_assist;

		  //        	}
		 ?>
	</div>

<?php 	

	


// checken of de form knop is geklikt 
if (isset($_POST['wijzig'])) {	

	  //  Velden zijn geldig en input in variabel plaatsen
	  
	  $nieuweSpelersDoelpunten = $_POST['spelersDoelpunten'];
	  $nieuweSpelersAssist = $_POST['spelersAssist']; 
	  $userIdPost = $_GET['id'];

	  // Checken of de velden niet leeg zijn
	  if (!empty($nieuweSpelersDoelpunten) && !empty($nieuweSpelersAssist)) {

	  // Proberen een geldige connectie te maken en een geldige sql query uit te voeren om gegevens te wijzigen
	  	// Het lukt niet om deze query te maken....
	  try {
		  	if (!empty($_GET['id'])) {
				$query = $conn->prepare('UPDATE `tervant_u10`.`spelers` SET `doelpunten` = :nieuweSpelersDoelpunten,
																			`assist` = :nieuweSpelersAssist
										 WHERE `spelers`.`ID` = :userIdPost');
				$query->execute(array(':nieuweSpelersDoelpunten' => $nieuweSpelersDoelpunten,
									  ':nieuweSpelersAssist' => $nieuweSpelersAssist,
									  ':userIdPost' => $userIdPost));

				// $result = $query->fetchAll();
		  	}
	 	} catch (Exception $e) {
	  	echo $e->getMessage(); 	
	 	} 
	  } else {
	  	// Er zijn lege velden gevonden, doorsturen om opnieuw te proberen met ID nummer
	  	// header("location: wijzig_speler.php?id=$userID");
	  	echo "string";
	  		  $userIdPost = $_GET['id'];
	  		  echo $userIdPost;

	  }
} 


$spelerSatistiek['doelpunten'] = "";
$spelerSatistiek['assist'] = "";
$spelerSatistiek['id'] = 0;

// Checken of de user id bestaat +
// De USER ID vn DB die is meegeven via URL oppikken en in variabel plaatsen

if ($_GET['id']) {
	$userID = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM spelers WHERE ID=:id');
	$query->execute(array(':id' => $userID));
	$row = $query->fetch();
	$spelersID = $row['ID'];
	$spelersDoelpunten = $row['doelpunten'];
	$spelersAssist = $row['assist'];

	// echo "$spelersID $spelersDoelpunten $spelersAssist";

} else {

		echo "kill it";
	
} 



?>

<form class="form" method="post" action="">';
	<h2 class="center">
		Wijzig gegevens
	</h2>
	<div class="center">

		<p><input type="text" name="spelersDoelpunten" value="<?php echo $spelersDoelpunten; ?>" </p>';
		<p><input type="text" name="spelersAssist" value="<?php echo $spelersAssist; ?>"></p>';
		<p><input type="text" name="spelers_id" value="<?php echo $spelersID; ?>" ></p>
	 	<p class="submit"><input type="submit" name="wijzig" value="WIJZIG"></p>';
	
	</div>
</form>';


 <?php 

toon_footer();

  ?>