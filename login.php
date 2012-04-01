<?php
function loginBox() {
  @session_start();
  //if(isset($_POST['username']) and isset($_POST['pass']))
  if(isset($_POST['username']) and isset($_POST['pass']))
  {
    require_once 'config.php';
    $konto = mysql_real_escape_string(trim($_POST['username']));
    $pass = mysql_real_escape_string(trim($_POST['pass']));
    
    if($konto!="" and $pass!="")
    {
      $pass = md5($pass);
      $query = "SELECT id FROM users WHERE user='$konto' and pass='$pass'";
      $result = mysql_query($query);
      $num = mysql_num_rows($result);
      
      $result = mysql_fetch_array($result);
      $id = $result['id'];
      
      if ($num==1)
      {
        $_SESSION['user_id'] = $id;
        $_SESSION['login'] = $konto;
		return true;
      }
	  else
		return false;	  
    }  
  }
  else
  {
?>
<form action="index.php" method="post" id="login">
	<h1> Logowanie </h1>
	Nazwa użytkownika:<br><input type="text" name="username"><br>
	Hasło:<br><input type="password" name="pass"><br>
	<input type="submit" value="Zaloguj">      
</form>
<?php 
  }
}

function checkLogin($konto, $pass)
{
	if($konto!="" and $pass!="")
	{
		$pass = md5($pass);
		$query = "SELECT id FROM users WHERE user='$konto' and pass='$pass'";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);

		$result = mysql_fetch_array($result);
		$id = $result['id'];

		if ($num==1)
		{
			$_SESSION['user_id'] = $id;
			$_SESSION['login'] = $konto;
			return true;
		}
		else
			return false;
		
	}  
	return false;
}

?>