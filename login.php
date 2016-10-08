<?php
session_start(); 
include 'conn.php';
include 'include.php';
$DB_username = "";
$DB_password = "";


if ($_POST) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $foutmeldingen = '';

  // controleren of de velden zijn ingevuld

  if (empty($_POST['username'])) {
    $foutmeldingen['username'] = "Vergeet je gebruikers naam niet!";
  }

  if (empty($_POST['password'])) {
    $foutmeldingen['password'] = "Vergeet je wachtwoord niet!";
  }



  //  connectie met databank maken en password + username selecteren
  $query = $conn->prepare("SELECT * FROM admin WHERE password='$password' AND username='$username'");
  
  // Proberen de query uit te voeren
  try {
      $query->execute();
      // $user = $query->fetch();       
    }
  catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
      }


  if (isset($query)) {
    //  Alle resultaten ophalen in de DB + session opstarten
    while ($row = $query->fetch()) {
      $DB_username = $row['username'];
      $DB_password = $row["password"];
      $_SESSION['user_voornaam']=$row['username'];
    }
  } else {
    echo "Query is niet gelukt";
  }
 // login username en password checken met database
 if ($DB_username == $username && $DB_password == $password) {
      // session instellen
        $_SESSION['login_status'] = true;
        header('location: index.php');
  } else {
    $foutmeldingen['login_fail'] = "controleer gebruikersnaam of wachtwoord";
    
  } 
 }   
?>

<?php
toon_header() 
?>
<section class="login">
	<div class="login-page">
  	<div class="inner-login-page">
      <h1 class="center">Login</h1>
    	<form class="form center" method="post" action="">
      	<p><input type="text" name="username" value="" placeholder="Username"></p>
      	<p><input type="password" name="password" value="" placeholder="Password"></p>
      	<!-- <p class="remember_me">
        	<label>
          	<input type="checkbox" name="remember_me" id="remember_me">
          	Remember me on this computer
        	</label>
      	</p> -->
      	<p class="submit"><input type="submit" name="commit" value="Login"></p>
        <div class="login_fail">
          <?php if (!empty($foutmeldingen)) {
                  echo $foutmeldingen['login_fail'];
                } 
          ?>
        </div>
    	</form>
  	</div>
    <div class="extra-info-login-page">
    		<div class="login-help center">
      	<p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    	</div>
    	<div class="center">
     		<!-- <p><a href="index.php">Terug naar homepage</a></p> -->
        <div class="menu">
          <ul class="menu_login">
            <li><a href="index.php">Home</a></li>
            <li><a href="spelers_tervant.php">Spelers</a></li>
            <li><a href="spelers_stat.php">Spelers statistieken</a></li>
            <li><a href="ploeg_doelsaldo.php">Ploeg doelpunten</a></li>
          </ul>
        </div>
     	</div>	
  	</div>
	</div>
</section>
  <?php toon_footer() ?>

