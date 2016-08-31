

<?php 
include 'conn.php';
include 'include.php';
toon_header() 
?>
<section class="login">
	<div class="login-page">
    	<div class="inner-login-page">
      	<h1 class="center">Login</h1>
      	<form class="form" method="post" action="index.php">
        	<p><input type="text" name="login" value="" placeholder="Username"></p>
        	<p><input type="password" name="password" value="" placeholder="Password"></p>
        	<p class="remember_me">
          	<label>
            	<input type="checkbox" name="remember_me" id="remember_me">
            	Remember me on this computer
          	</label>
        	</p>
        	<p class="submit"><input type="submit" name="commit" value="Login"></p>
      	</form>
    	</div>
    	<div class="extra-info-login-page">
    		<div class="login-help center">
      	<p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    	</div>
    	<div class="center">
     		<p><a href="index.php">Terug naar homepage</a></p>
     	</div>	
    	</div>
  	</div>
</section>
  <?php toon_footer() ?>