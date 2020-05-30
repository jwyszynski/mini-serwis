<?php //Wymagaj fun.php i connect.php
require_once('fun.php'); 
require_once "data/connect.php";

?>



<?php open("Aktualności z serwisu"); ?>
<?php nav(); ?>

	
	<h1>Witaj w Aktualnościach</h1>
	<hr>





<?php
// Połącz z Bazą Danych

try {
	$con = new PDO("mysql:host=localhost;dbname=$db_name;encoding=utf8", "$db_user", "$db_password");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
	echo $e->getMessage();
}

$tbl = $con->query( 'SELECT * FROM `posts`' );

foreach ($tbl->fetchAll() as $value) {
	echo '<pre>';
	print_r( $value );

	# code...
}
	
?>


			

<?php footer(); ?>