<?php 
// session_start();
include 'conn.php';
include 'include.php';

// $logged_in = false;
// if (empty($_SESSION['login_status'])) {
// }elseif ($_SESSION['login_status'] == true) {
// 	$user_voornaam =  $_SESSION['user_voornaam'];
// 	$logged_in = true;
// }

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

			  	<p><input class="login_input" type="text" name="achternaam" value="" placeholder="achternaam"></p>

			  	<p><input class="login_input" type="text" name="username" value="" placeholder="username"></p>

			  	<p><input class="login_input" type="password" name="password1" value="" placeholder="wachtwoord"></p>

			  	<p><input class="login_input" type="password" name="password2" value="" placeholder="wachtwoord"></p>

			  	<p class="submit"><input type="submit" name="commit" value="REGISTREER"></p>
			    <div class="login_fail">
			      <?php if (!empty($foutmeldingen)) {
			              echo $foutmeldingen['login_fail'];
			            } 
			      ?>
			    </div>
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