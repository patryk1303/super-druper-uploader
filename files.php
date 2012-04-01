<?php 
  session_start();
  require_once 'config.php';
  
  $sciezka = dirname(__FILE__);
  
  if (isset($user_id) and isset($login))
  {
    $cel_folder = $sciezka.'/pliki/'.$user_id.'/';
  }
?>
<!doctype html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title><?php echo $name; ?></title>
  <style type="text/css">
	#files {
		border-collapse: collapse;
		width: 100%;
	}
	#files tr:nth-child(2n) {
		background: lightgrey;
	}
	#files tr:nth-child(2n+1) {
		background: lightgreen;
	}
	#files td, #files th {
		border: 1px solid black;
	}
	#files td a{
		display: block;
		color: blue;
		text-decoration: none;
	}
	#files tr:nth-child(2n) a:hover {
		background: grey;
	}
	#files tr:nth-child(2n+1) a:hover {
		background: green;
	}
  </style>
  </head>
  <body>
    <?php
      if (isset($user_id) and isset($login))
      {
        include 'menu.php'; 

        $query = "SELECT * FROM `files` WHERE `user_id` = '$user_id'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        
        //echo $num;
    ?>
    <table id="files">
      <tr>
        <th>Nazwa pliku</th>
        <th>Rozmiar</th>
        <th>Usuń</th>
      </tr>
    <?php
        for ($i=0; $i<$num; $i++)
        {
          echo "<tr>";
          $file_id   = mysql_result($result, $i, "id");
          $file_loc  = mysql_result($result, $i, "loc");
          $file_name = mysql_result($result, $i, "name");
          $file_size = mysql_result($result, $i, "size");
          
          //echo '<td><a href="'.$file_loc.'">'.$file_name.'</a></td>';
          echo '<td><a href="download.php?id='.$file_id.'">'.$file_name.'</a></td>';
          echo '<td>'.$file_size.' KB</td>';
          echo '<td><a href="delete.php?id='.$file_id.'">[X]</a></td>';
		  
          
          echo "</tr>";
        }
  
      }
      else
      {
        echo "Dostęp do tej części wymaga zalogowania się!";
      }
    ?>
  </body>
</html>