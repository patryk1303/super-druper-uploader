<?php
  require_once 'config.php';
  if (isset($_POST['username']) and isset($_POST['pass1']) and isset($_POST['pass2']))
  {
    if($_POST['pass1'] == $_POST['pass2'])
    {
      $konto = mysql_real_escape_string(trim($_POST['username']));
      $pass = md5(mysql_real_escape_string(trim($_POST['pass1'])));
      $ile = mysql_query("SELECT * FROM `users` WHERE user='$konto'");
      $ile = mysql_num_rows($ile);
      if ($ile==0)
      {
        $query = "INSERT INTO users (user,pass) VALUES ('$konto','$pass')";
        mysql_query($query) or die("Wystapił błąd :-(");
        echo "Konto <i>$konto</i> zostało utworzone";
      }
      else
      {
        echo "Taki użytkownik już istnieje";
      }
    }
    else
    {
      echo "Podane hasła nie zgadzaja się";
    }
  }
  else
  {
?>
<!doctype html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body>
    <h1> Dodaj nowego użytkonika </h1>
    <form action="register.php" method="post">
      Nazwa użytkownika: <input type="text" name="username"><br>
      Hasło: <input type="password" name="pass1"><br>
      Powtórz hasło: <input type="password" name="pass2"><br>
      <input type="submit" value="Zarejestruj">
      
    </form>
  </body>
</html>

<?php 
  }

?>