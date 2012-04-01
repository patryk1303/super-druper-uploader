<?php
  $name = "Super druper uploader plików";

  define("DB_HOST","localhost");
  define("DB_BASE","test2");
  define("DB_USER","root");
  define("DB_PASS","");
  
  mysql_connect(DB_HOST, DB_USER, DB_PASS)
  or die('Nie udało połączyc się z bazą danych. ');

  mysql_select_db(DB_BASE);
  
  if (isset($_SESSION['user_id']) and isset($_SESSION['login']))
  {
    $user_id = $_SESSION['user_id'];
    $login = $_SESSION['login'];
  }
?>
