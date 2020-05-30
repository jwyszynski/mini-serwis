<?php
session_start();


/* Góra dokumentu */
	function open($ti = "JWyszynski.pl") {
echo 
'<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/main-style.css"> <!-- Main-Style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>'.$ti.'</title>

	<!-- Global site tag (gtag.js) - Google Analytics 
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87089738-4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag("js", new Date());

	  gtag("config", "UA-87089738-4");
	</script>-->


</head>
<body>';

	}
/* ################################### */
/*              Logowanie              */
/* ################################### */

function niezalogowany() {
echo <<<END
<li class="has-children account">
	<a href="#0">
		
		Zaloguj się
	</a>

<ul>
	<li><a href="sign-in.php">Zaloguj się</a></li>
	<li><a href="sign-up.php">Zarejestruj się</a></li>
</ul>
</li>
END;
	}

	function zalogowany() {
echo '<li class="has-children account">';
echo	'<a href="#0">';
echo		'<img src="img/default-user-image.png" alt="avatar">';
echo		"Witaj: ".$_SESSION['user'];
echo	'</a>';

echo'<ul>';

echo	'<li><a href="#0">Moje Konto</a></li>';
echo	'<li><a href="#0">Edytuj Informacje</a></li>';
echo	'<li><a href="logout.php">Wyloguj</a></li>';
echo'</ul>';
echo'</li>';

	}

/* Nawigacja(HEADER) */
	function nav() {
echo <<<END
	<header class="cd-main-header">
		<a href="index.php" class="cd-logo"><img style="width:124px;" src="img/cd-logo2.png" alt="Logo"></a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="search" placeholder="Search...">
			</form>
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li><a href="about.php">O Nas</a></li>
				<li><a href="#0">Pomoc</a></li>
END;
				
if (isset($_SESSION['online'])) {
	zalogowany();
} else {
	niezalogowany();
}
				
echo <<<END
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Serwis</li>
				<li class="overview">
					<a href="aktualnosci.php">Aktualności</a>
				</li>

				<li class="has-children education">
					<a href="#0">Szkolne Prace</a>
					
					<ul>
						<li><a href="prace.php">Prace</a></li>
						<li><a href="skrypty_js.php">Skrypty JS</a></li>
						<li><a href="#0">Skrypty PHP</a></li>
					</ul>
				</li>

				<li class="has-children images">
					<a href="#0">Grafiki</a>
					
					<ul>
						
					</ul>
				</li>

				<li class="comments">
					<a href="#0">Chat[Nieaktywny]</a>
					
				</li>
END;
	if (isset($_SESSION['admin'])) {
	if ($_SESSION['admin']==true) {
		echo 
			'<li class="has-children administration">
				<a href="#0">Administracja</a>
				
				<ul>
					<li><a href="admin_panel.php">Panel Administracyjny</a></li>
					<li><a href="admin_panel_posts.php">Posty</a></li>
					<li><a href="admin_panel_users.php">Użytkownicy</a></li>
				</ul>
			</li>';
	}}
echo <<<END
			</ul>

			<ul>
				<li class="cd-label">Dodatki</li>

				<li class="has-children users">
					<a href="#0">Polecane Strony</a>
					
					<ul>
						<li><a href="#0">Serwisy Warte Odwiedzenia</a></li>
						<li><a href="#0">Strony Znajomych</a></li>
						<li><a href="#0">Moje stare projekty</a></li>
					</ul>
				</li>

				<li class="has-children bookmarks">
					<a href="#0">Bookmarks</a>
					
					<ul>
						<li><a href="#0">All Bookmarks</a></li>
						<li><a href="#0">Edit Bookmark</a></li>
						<li><a href="#0">Import Bookmark</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Napisz do Nas!</li>
				<li class="action-btn"><a href="#0">Kontakt</a></li>
			</ul>
		</nav>

		<div class="content-wrapper">
END;
	}


/* FOOTER */

function footer() {
echo <<<END
<footer>
  <p>&copy; 2017 JWyszynski.pl | <a href="about.php">About</a> | <a style="line-height:25px;" href="#">Terms&nbsp;of&nbsp;use</a></p>
</footer>

</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
END;
	}

/* ################################### */
/*             INNE SKRYPTY            */
/* ################################### */


?>