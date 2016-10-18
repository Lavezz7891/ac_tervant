<?php
session_start(); 
include 'conn.php';
include 'include.php';
$DB_username = "";
$DB_password = "";
$_SESSION['login_status'] = false;

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $foutmeldingen = '';
  $foutmeldingen['login_fail'] = '';

  // controleren of de velden zijn ingevuld

  if (empty($username)) {
    $foutmeldingen['username'] = "Vergeet je gebruikers naam niet!";
  }

  if (empty($password)) {
    $foutmeldingen['password'] = "Vergeet je wachtwoord niet!";
  }


  
  // Proberen de query uit te voeren
  try {
      //  connectie met databank maken en password + username selecteren
      $query = $conn->prepare("SELECT * FROM admin WHERE password='$password' AND username='$username'");
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      while ($row = $query->fetch()) {
        $DB_username = $row['username'];
        $DB_password = $row["password"];
        $is_admin = $row['is_admin'];
        $_SESSION['user_voornaam']=$row['username'];
        $_SESSION['user_is_admin']=$is_admin;
      }
    }
  catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
      }

 // login username en password checken met database
 if ($DB_username == $username && $DB_password == $password && isset($_SESSION['user_voornaam'])) {
        // session instellen
        $_SESSION['login_status'] = true;
        $_SESSION['username'] = $DB_username;
        $_SESSION['user_is_admin']=$is_admin;
        header('location: index.php');
  } else {
    $foutmeldingen['login_fail'] = "controleer gebruikersnaam of wachtwoord";
    
  } 
 }   
?>

<?php
toon_header();
echo $DB_password;
echo $DB_username;
?>
<section class="login">
	<div class="login-page">
  	<div class="inner-login-page">
      <h1 class="login_h1">A.C. Tervant u10A Luca D'Amires</h1>
      <h2 class="center">Welkom, </h2>
      <h2 class="center">log in of registreer </h2>
    	<form class="form center" method="post" action="">
      	<p>username<input class="login_input" type="text" name="username" value="" placeholder=""></p>
      	<p>wachtwoord<input class="login_input" type="password" name="password" value="" placeholder=""></p>
      	<p class="submit"><input type="submit" name="submit" value="Login"></p>
        <div class="login_fail">
          <?php if (isset($foutmeldingen)) {
                  echo $foutmeldingen['login_fail'];
                } 
          ?>
        </div>
        <div class="registreren">
          <p><a href="registreer.php">Registreer nu</a></p>
        </div>
    	</form>
  	</div>
     <!--<div class="extra-info-login-page">
    		<div class="login-help center">
      	<p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    	</div>
    	<div class="center">
     		<p><a href="index.php">Terug naar homepage</a></p> 
        <div class="menu">
          <ul class="menu_login">
            <li><a href="index.php">Home</a></li>
            <li><a href="spelers_tervant.php">Spelers</a></li>
            <li><a href="spelers_stat.php">Spelers statistieken</a></li>
            <li><a href="ploeg_doelsaldo.php">Ploeg doelpunten</a></li>
          </ul>
        </div>
     	</div>	
  	</div> -->
	</div>
</section>
  <?php toon_footer() ?>

