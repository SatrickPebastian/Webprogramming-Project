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

    $newEmail = $_POST['email'];
    $newStreet = $_POST['street'];
    $newCity = $_POST['city'];
    $newPlz = $_POST['plz'];
    $userId = $_SESSION['id'];

    $sql = "UPDATE user SET email = '$newEmail', street = '$newStreet', stadt = '$newCity', plz = '$newPlz' WHERE id = '$userId';";
    $result = $webshopcon->query($sql);

    mysqli_close($webshopcon);

    
?>