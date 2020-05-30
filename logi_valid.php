<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: login.php');
		exit();
	}

	require_once "data/connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$opis = $_POST['opis_logowania'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($result = @$connection->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($connection,$login))))
		{
			$how_many_users = $result->num_rows;
			if($how_many_users>0)
			{
				$table = $result->fetch_assoc();

				if (password_verify($password, $table['pass'])) {
					
					$_SESSION['online'] = true;
					
					
					$_SESSION['id'] = $table['id'];
					$_SESSION['user'] = $table['user'];
					$_SESSION['email'] = $table['email'];
					$_SESSION['date_of_registration'] = $table['date_of_registration'];
					$_SESSION['admin'] = $table['admin'];
	
						$user_id = $_SESSION['id'];
						$user_ip = $_SERVER['REMOTE_ADDR'];
						$user_name = $_SESSION['user'];
						@$connection->query(
						sprintf("INSERT INTO users_ip VALUES (NULL, '$user_id', now(), '$user_ip', '$user_name', '$opis')")
						);
					
					unset($_SESSION['err']);
					$result->free_result();
					header('Location: index.php');
				}
				else {
				
				$_SESSION['err'] = '<span style="color:red">Invalid login or password</span>';
				header('Location: login.php');	
				}
			} else {
				
				$_SESSION['err'] = '<span style="color:red">Invalid login or password</span>';
				header('Location: login.php');
				
			}
			
		}
		
		$connection->close();
	}
	
?>