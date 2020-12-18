<?php
     //Verbindung herstellen
     $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
     if(!$webshopcon){
         echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
         echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
         echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
         exit;
     }

     
    $articleId = $_POST['deleteArticle'];
    $sql = "DELETE FROM warenkorb WHERE artikel = '$articleId';";
    $result = $webshopcon->query($sql);
        

     header("Location: warenkorb.php");

     mysqli_close($webshopcon);




?>