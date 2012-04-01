<?php
  session_start();
  require_once 'config.php';
?>
<!doctype html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title><?php echo $name; ?></title> 
  <style type="text/css">
	#upload {
		text-align: center;
		width: 490px;
		margin: 0 auto;
		border: 1px solid black;
		padding: 5px;
		border-radius: 10px;
	}
	#upload input[type=submit] {
		background: white;
		border: 5px double black;
	}
  </style>
</head>
<body>
<?php
  if (isset($user_id) and isset($login))
  {
  include 'menu.php'; 
?>
  <form action="upload_file.php" name="upload_file" method="post" enctype="multipart/form-data" id="upload">
    <!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />-->
    Plik: <input type="file" name="file"><br>
    <input type="submit" value="Wyślij plik">          
  </form>
<?php
  }
  else
    echo "Musisz się zalogować, by dodać plik\n";
?>
</body>
</html>