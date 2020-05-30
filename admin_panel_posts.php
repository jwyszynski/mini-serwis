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
		Edycja i wstawianie postów</h1>
		<hr>
		<p>Tu może być: wyświetlanie wsysztkich postów, edycja konkretnych oraz dodawanie nowych.</p>
		




<?php footer(); 
}; // koniec panelu
?>