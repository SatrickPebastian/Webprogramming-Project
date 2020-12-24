<?php

    //Verbindung herstellen
    $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
    if(!$webshopcon){
      echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
      echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    $userEmail = $_POST['email'];

    $sql = "SELECT email FROM user WHERE email ='$userEmail';";
    $result = $webshopcon->query($sql);

    $response = false;

    $row = $result->fetch_assoc();

    if($row === null){
        //email noch nicht vorhanden
        $response = true;
    }else {
        //email bereits vorhanden
        $response = false;
    }

    if($userEmail = ''){
        $response = '';
    }

    
    
    echo json_encode($response);

    
?>