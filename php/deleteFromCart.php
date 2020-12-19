<?php

    session_start();
     //Verbindung herstellen
     $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
     if(!$webshopcon){
         echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
         echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
         echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
         exit;
     }

    $userId = $_SESSION['id'];
    $articleId = $_POST['deleteArticle'];
    $sql = "DELETE FROM warenkorb WHERE artikel = '$articleId' and user = '$userId';";
    $result = $webshopcon->query($sql);
        

    mysqli_close($webshopcon);
    header("Location: warenkorb.php");

     




?>