<?php 
// session_start();
include 'conn.php';
include 'include.php';

if (isset($_POST['submit'])) {

$voornaam 	= "";
$achternaam 	= "";
$username 	= "";
$password1 	= "";
$password2 	= "" ;
$is_admin		= "";


  // controleren of de velden zijn ingevuld

  if (empty($_POST['voornaam'])) {
    $foutmeldingen['voornaam'] = "Vergeet je voornaam naam niet!";
  }

  if (empty($_POST['achternaam'])) {
    $foutmeldingen['achternaam'] = "Vergeet je achternaam niet!";
  }

  if (empty($_POST['username'])) {
    $foutmeldingen['username'] = "Vergeet je username niet!";
  }

 if (empty($_POST['password1'])) {
    $foutmeldingen['wachtwoord1'] = "Vergeet je wachtwoord  niet!";
  }

  if (empty($_POST['password2'])) {
    $foutmeldingen['wachtwoord2'] = "Vergeet je wachtwoord niet!";
  }


if (empty($foutmeldingen)) {
	$i = 0;
  	$voornaam 	= $_POST['voornaam'];
  	$achternaam 	= $_POST['achternaam'];
  	$username 	= $_POST['username'];
  	$password1 	= $_POST['password1'];
	$password2 	= $_POST['password2'];
	$is_admin		= $_POST['is_admin'];


  	

  
  // Proberen de query uit te voeren
  try {
        //  connectie met databank maken en password + username selecteren
        $query = 	"INSERT INTO `admin`
    						 	(`voornaam`, 
    						 	`achternaam`,
    						 	`username`, 
    							`password`,
    							`is_admin`) 
    				VALUES  (  	:voornaam,
	  			   			   	:achternaam,
	  			   			   	:username,
	  			   			   	:password,
	  			   			   	:is_admin)";


	    $result = array(':voornaam'		=> $voornaam,
						':achternaam'	=> $achternaam,
						':username'		=> $username,
						':password'		=> $password1,
						':is_admin'		=> $is_admin);

	    $query_ready = $conn->prepare($query);
	    //  query uitvoeren
    	$query_ready->execute($result);
    	// na het succesvol uitvoeren van de query de gebruiken redirecten
    	header("location: login.php");

     
    }
  catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
        echo "Er is iets misgelopen bij het toevoegen van de gebruiker";
      }
   }   else {
   	// echo "er zijn fouten gevonden";
   }
}
toon_header(); 
?>

<body>
<section class="registreerWrapper">
	<div class="login-page">
		<div class="inner-login-page">
			<h1 class="center">Vul je gegevens in</h1>
			<h2 class="center">Alle velden zijn verplicht</h2>
			<form class="form center" method="post" action="">

			  	<p><input class="login_input" type="text" name="voornaam" value="" placeholder="voornaam"></p>
			  	<div class="registreer_fail"><?php if (isset($foutmeldingen)) { echo $foutmeldingen['voornaam'];} ?></div>		  	<p><input class="login_input" type="text" name="achternaam" value="" placeholder="achternaam"></p>
				<div class="registreer_fail"><?php if (isset($foutmeldingen)) { echo $foutmeldingen['achternaam'];} ?></div>
			  	<p><input class="login_input" type="text" name="username" value="" placeholder="username"></p>
				<!-- <?php if (isset($foutmeldingen)) { echo $foutmeldingen['username'];} ?>	 -->

				<div class="hidden_admin_input">
					 <label>Admin</label>
				   	 <p>ja<input class="login_input radio_btn" type="radio" name="is_admin" value="ja"><br></p>
				  	 <p>nee<input class="login_input radio_btn" type="radio" name="is_admin" value="nee" checked></p>
				</div>

			  	<p><input class="login_input" type="password" name="password1" value="" placeholder="wachtwoord"></p>
				<div class="registreer_fail"><?php if (isset($foutmeldingen)) { echo $foutmeldingen['wachtwoord1'];} ?></div>

			  	<p><input class="login_input" type="password" name="password2" value="" placeholder="wachtwoord"></p>
				<div class="registreer_fail"><?php if (isset($foutmeldingen)) { echo $foutmeldingen['wachtwoord2'];} ?></div>

			  	<p class="submit"><input type="submit" name="submit" value="REGISTREER"></p>
			    
					<div class="extra-info-login-page">
				        <div class="registreer_menu">
				          <ul class="center registreer_menu_login">
				            <li><a href="index.php">Home</a></li>
				            <li><a href="spelers_tervant.php">Spelers</a></li>
				            <li><a href="spelers_stat.php">Spelers statistieken</a></li>
				            <li><a href="ploeg_doelsaldo.php">Ploeg doelpunten</a></li>
				          </ul>
				        </div>
			     	</div>	
			  	</div>
			</form>
		</div>
	</div>
</section>

 
<?php toon_footer() ?>