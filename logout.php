<?php
	@session_start();
	require_once 'config.php';
	function logout()
	{
		global $user_id, $login;
		if (isset($user_id) and isset($login))
		{
			session_unset();
			session_destroy();
			return true;
		}
		else
			return false;
		return false;
	}
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="refresh" content="2;URL=index.php">
		<title><?php echo $name; ?></title>
	</head>
	<body>
		<?php
			if (logout())
				echo 'Wylogowano';
			else
				echo 'Nie ma kogo wylogować';
		?>
	<br>Za dwie sekundy nastąpi przekierowanie do strony głównej.
	</body>
</html>
