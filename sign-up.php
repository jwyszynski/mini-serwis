<?php require_once('fun.php'); ?>

<?php open(); ?>
<?php nav(); ?>

	
			<h1>Podstrona do rejestracji</h1>
			<hr>
			<p>W razie problemów proszę o kontakt:<br />
			Kontakt: kontakt@jwyszynski.pl</p>
			

			<?php
	
	if ((isset($_SESSION['online'])) && ($_SESSION['online']==true))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['email'])) {
		$all_ok = true;
		$nick = $_POST['nick'];

		#======================================================= NICK
			if ((strlen($nick)<1) || (strlen($nick)>30)) {
				$all_ok = false;
				$_SESSION['e_nick']="Wrong Nickname(too long(max 30) or too short(min 1))";
			}
		#======================================================= NICK
			if (ctype_alnum($nick)==false) {
				$all_ok = false;
				$_SESSION['e_nick']="Wrong Nickname(Alfanumeric)";
			}
		#======================================================= EMAIL
			$email = $_POST['email'];
			$emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
			if ((filter_var($emailS, FILTER_VALIDATE_EMAIL)==false) || ($emailS!=$email)) {
				$all_ok = false;
				$_SESSION['e_email']="Wrong email";
			}
		#======================================================= PASSWORD
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			if ((strlen($pass1)<1) || (strlen($pass1)>20)) { //zmienione na 1
				$all_ok = false;
				$_SESSION['e_pass']="Password too long or too short";
			}
			if ($pass1!=$pass2) {
				$all_ok = false;
				$_SESSION['e_pass']="The passwords provided are not identical";
			}

			$password_hash = password_hash($pass1, PASSWORD_DEFAULT);
		#======================================================= ACCEPT terms and conditions
			/*if (!isset($_POST['accept'])) {
				$all_ok = false;
				$_SESSION['e_acc']="You must accept the terms and conditions";
			}*/
		// #======================================================= reCAPTCHA
		// 	$secret = "6Lde8yAUAAAAAAH7hSTq5xEVowFPOmCa3iyqpos8";
		// 	$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

		// 	$response = json_decode($check);

		// 	if ($response->success==false) {
		// 		//$all_ok = false;
		// 		$_SESSION['e_bot']="BOT DETECTED";
		// 	}


			//--------------------------------------------------- zapisz do sesji
			$_SESSION['fr_nick'] = $nick;
			$_SESSION['fr_email'] = $email;
			$_SESSION['fr_pass1'] = $pass1;
			$_SESSION['fr_pass2'] = $pass2;
			if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;



		require_once "data/connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$connetion = new mysqli($host, $db_user, $db_password, $db_name);
			if ($connetion->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $connetion->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($connetion->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$all_ok=false;
					$_SESSION['e_email']="Email already exist";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $connetion->query("SELECT id FROM users WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($connetion->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$all_ok=false;
					$_SESSION['e_nick']="Nick already exist";
				}
				
				if ($all_ok==true)
				{
					// Jeśli wszystkie testy zaliczone to dodajemy użytkownika do bazy
					
					$ip_user = $_SERVER['REMOTE_ADDR'];

					if ($connetion->query("INSERT INTO users VALUES (NULL, '$nick', '$password_hash', '$email', now(), false, '$ip_user')"))
					{
						$_SESSION['successful']=true;
						header('Location: welcome.php');
					}
					else
					{
						throw new Exception($connetion->error);
					}
					
				}
				
				$connetion->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />ERROR INFO: '.$e;
		}
		//--------------------------------------------------

			

			if ($all_ok==true) {
				// It's OK
				exit();
		}
	}

?>

<link rel="stylesheet" href="css/style-signup.css"> <!-- CSS dla rejestracji -->
<!--<script src='https://www.google.com/recaptcha/api.js'></script>  reCAPTCHA from GOOGLE -->

	<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Zarejestruj się</h3>
    <fieldset>
      <input placeholder="Your name" type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" tabindex="1" required autofocus>
		<?php
				if (isset($_SESSION['e_nick'])) {
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
			?>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" tabindex="2" required>
		<?php
				if (isset($_SESSION['e_email'])) {
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
			?>
    </fieldset>
    <fieldset>
      <input placeholder="Your Password" type="password" value="<?php
			if (isset($_SESSION['fr_pass1']))
			{
				echo $_SESSION['fr_pass1'];
				unset($_SESSION['fr_pass1']);
			}
		?>" name="pass1" tabindex="3" required>
		<?php
				if (isset($_SESSION['e_pass'])) {
					echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
					unset($_SESSION['e_pass']);
				}
			?>
    </fieldset>
    <fieldset>
      <input placeholder="Confirm your password" type="password" value="<?php
			if (isset($_SESSION['fr_pass2']))
			{
				echo $_SESSION['fr_pass2'];
				unset($_SESSION['fr_pass2']);
			}
		?>" name="pass2" tabindex="4" required>
    </fieldset>
    <label>
		<input type="checkbox" name="accept" <?php
			if (isset($_SESSION['fr_regulamin'])) {
				echo "checked";
				unset($_SESSION['fr_regulamin']);}?>
			/> I accept the terms and conditions<br />
		</label>
		<?php
				if (isset($_SESSION['e_acc'])) {
					echo '<div class="error">'.$_SESSION['e_acc'].'</div>';
					unset($_SESSION['e_acc']);
				}
			?>
    <fieldset>
	<input type="submit" name="submit" value="register">
    </fieldset>
  </form>
</div>
	
<?php
//	if(isset($_SESSION['err']))	echo $_SESSION['err'];
?>
			
	


<?php footer(); ?>