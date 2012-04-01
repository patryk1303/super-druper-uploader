<?php
  session_start();
  require_once 'config.php';
  
  if (!isset($_GET['id']))  $_GET['id']=0;
  
  $getID=$_GET['id'];
  
  if ($getID > 0)
		if (isset($user_id) and isset($login))
		{
		  $query = "SELECT `user_id`,`private`,`loc` FROM `files` WHERE `id`='$getID' and `user_id`='$user_id'";
		  $result = mysql_query($query);
		  $num = mysql_num_rows($result);
		  if ($num==1)
			$file_loc = mysql_result($result, 0, "loc");
		 }
?>
<!doctype html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com"> 
  <?php
  if ($getID > 0 and $num==1) echo '<meta http-equiv="refresh" content="2;URL='.$file_loc.'">';
  ?>
  <title><?php echo $name; ?></title>
  </head>
  <body>
    <?php
      if (isset($user_id) and isset($login))
      {
        include 'menu.php'; 
      }
	  if ($getID > 0)
	  {
		if (isset($user_id) and isset($login))
		{
		  if ($num!=1)
			echo 'Ten plik nie należy do ciebie';
		}
		else
		{
		  echo 'Aby pobierać pliki, trzeba się zalogować';
		}
	  }
	  else
	  {
		echo 'Nie wybrano pliku do pobrania';
	  }
	  if ($getID > 0  and $num==1) echo 'Pobieranie pliku powinno się rozpocząć za 2 sekundy<br>';
    ?>
  </body>
</html>
