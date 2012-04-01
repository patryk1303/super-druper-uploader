<?php
  session_start();
  require_once 'config.php';
  require_once 'login.php';
  
  $zle_dane = false;
 
?>
<!doctype html>
<html>
  <head>
	  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	  <?php	if (isset($_POST['username']) and isset($_POST['pass']) and checkLogin($_POST['username'], $_POST['pass'])) echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">"; ?>
	  <title><?php echo $name; ?></title>
	    <style type="text/css">
			#login {
				text-align: center;
				width: 200px;
				margin: 0 auto;
				border: 1px solid black;
				padding: 5px;
				border-radius: 10px;
			}
			#login h1 {
				border-bottom: 1px dotted grey;
				margin-top: 0px;
			}
		</style>
  </head>
  <body>
    <?php
      if (isset($user_id) and isset($login))
      {
        include 'menu.php'; 
		echo "Nic tu nie ma<br>
		Nie planów, aby coś tu było!";
      }
      else
      {
        echo "Hej, gość!<br>";
        loginBox();
      }
	  if (isset($_POST['username']) and isset($_POST['pass']) and checkLogin($_POST['username'], $_POST['pass']))
		echo 'Zalogowano pomyślnie';
    ?>
  </body>
</html>
