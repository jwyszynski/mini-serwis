<?php //Wymagaj fun.php i connect.php
require_once('fun.php'); 
require_once "data/connect.php";

// Połącz z Bazą Danych
	$connection = new mysqli($host, $db_user, $db_password, $db_name);
?>



<?php open("Aktualności z serwisu"); ?>
<?php nav(); ?>

	
	<h1>Witaj w Aktualnościach</h1>
	<hr>



<?php
// Połącz z Bazą Danych
	$connection = new mysqli($host, $db_user, $db_password, $db_name);
		mysqli_query($connection, "SET CHARSET utf8");
		

if ($connection->connect_errno!=0) {
		echo "ERROR: ".$connection->connect_errno." Opis: ".$connection->connect_errno;
	} else {

			if ($result = $connection->query("SELECT * FROM posts ORDER BY id_post DESC")) //sortuję według id_post malejąco
			{
				$ile = mysqli_num_rows($result);
				for ($i = 1; $i <= $ile; $i++) {
					$row = mysqli_fetch_assoc($result);
					$a1 = $row['id_post'];
					$a2 = $row['title_post'];
					$a3 = $row['post'];
					$a4 = $row['plus'];
					$a5 = $row['date'];
		
		
echo<<<END
<div class="post">
 <p><b>$a5</b></p>
 <h2>$a2</h2>
	<p>$a3</p>
	<div class="code"><code>
		$a4
	</code></div>
	<hr class="split">
</div>
END;
				}

				}
			}
		$connection->close();
?>


			

<?php footer(); ?>