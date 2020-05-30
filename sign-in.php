<?php require_once('fun.php'); ?>

<?php open(); ?>
<?php nav(); ?>

	
			<h1>Zaloguj się!</h1>
			<hr>


<div class="login-box">
  <form action="logi_valid.php" method="post">

      <input type="text" placeholder="Username" name="login"><br /><br />

      <input type="password" placeholder="Password" name="password"><br /><br />

    <div>
      <input type="submit" value="Login"/>
    </div>
  </form>
  <br /><a href="sign-up">Zarejestruj się</a>
</div>
			
		




<?php footer(); ?>