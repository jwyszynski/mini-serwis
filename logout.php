<?php

	session_start();//Wystartuj sesję
	
	session_unset();//Wyczyść sesję
	
	header('Location: index.php');//Przekieruj do strony głównej

?>