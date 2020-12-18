<?php
    sleep(2);
    //Verbindung herstellen
    $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                            
    if(!$webshopcon){
        echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
        echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    $sql = "DELETE FROM bestellungen;";
    $result = $webshopcon->query($sql);



    mysqli_close($webshopcon);

    header("Location: orders.php");
?>