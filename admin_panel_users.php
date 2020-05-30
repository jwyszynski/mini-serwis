<?php 
session_start();
		//Jesli nie zalogowany to odeslij do index.php
	if (!isset($_SESSION['online']))
	{
		header('Location: login.php');
		exit();
	}	//Jezeli nie admin to odeslij do profile.php
	if ($_SESSION['admin']!=true) {
		header('Location: index.php');
		exit();
	}
	else{
require_once('fun.php'); ?>

<?php open(); ?>
<?php nav(); ?>

		<div class="banner"><img src="img/code_banner.jpg"></div>
		<h1 class="with-banner">Fajnie jest być Adminem<br />
		Let's Code!</h1>
		<hr>
		<p>Twoje możliwości są teraz nieograniczone, możesz palić, niszczyć, tworzyć, nauczać. Stać Cię na wszystko, pokaż co POTRAFISZ!</p>
		<div style="width: 1060px;margin-left: auto;margin-right: auto;">
		<div class="admin-part">Treść 1</div>
		<div class="admin-part">Treść 2</div>
		<div class="admin-part">Treść 3</div>
		<div class="admin-part">Treść 4</div>
		</div>




<?php footer(); 
}; // koniec panelu
?>