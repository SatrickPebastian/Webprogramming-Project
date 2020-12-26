<?php

    //Verbindung herstellen
    $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
    if(!$webshopcon){
      echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
      echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    
      $sql = "SELECT username, status FROM user WHERE status = 'online';";
      $result = $webshopcon->query($sql);

      $counter = 0;

      //Gibt Online User aus
        while($row = $result->fetch_assoc()){
          
          if($row['status'] == 'online'){
            echo '<div class="container>"';
            echo '<p><i class="fas fa-circle" style="color:forestGreen;font-size:13px;"></i> '.$row['username'].'</p>';
            echo '</div>';
            $counter++;
          }
        }

        if($counter == 0){
          echo '<div class="container">';
          echo '<p>Kein Nutzer online.</p>';
          echo '</div>';
        }
    
        //'<div class="container"><div class="row"><div class="col-0"><i class="fas fa-circle" style="color:green;font-size:13px;"></i></div><div class="col-2"><p class="float-left">'.$row['username'].'</p></div></div></div>';


?>