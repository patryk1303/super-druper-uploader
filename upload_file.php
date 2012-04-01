<?php
  session_start();  
  require_once 'config.php';
  
  $sciezka = dirname(__FILE__); //ścieżka główna do plików
  
  
  if (isset($user_id) and isset($login))
  {  
      include 'menu.php'; 
      echo "<br>";
      $cel_folder = $sciezka."/pliki/".$_SESSION['user_id']."/";
      if (!file_exists('/'.$cel_folder))
         @mkdir($cel_folder);
      
      @$cel_plik = $cel_folder . basename($_FILES['file']['name']);
     if(!file_exists($cel_plik))
     { 
        if(move_uploaded_file($_FILES['file']['tmp_name'],$cel_plik))
        {
          $name = basename($_FILES['file']['name']);
          $cel = 'pliki/'.$user_id.'/'.$name;
          $size = round($_FILES["file"]["size"]/1024,2);
          //echo $cel;
          echo "Wysłano plik!<br>";
          echo 'Link: <a href="pliki/'.$_SESSION['user_id'].'/'.basename($_FILES['file']['name']).'">plik</a>';
          $query = "INSERT INTO `files` (`id` , `user_id` , `private`, `name` , `loc`, `size` ) VALUES ( NULL , '$user_id', '1', '$name' , '$cel', '$size')";
          //echo "<br>$query<br>";
          mysql_query($query);
		 // echo "<br>$query<br>";
        }
        else
        {
          echo "Wystąpił błąd";
        }
      }
      else
      {
        echo "Plik istnieje";
      }
  }
?>