<?php 
    try {

        //Verbindung herstellen
        $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
        
        if(!$webshopcon){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        

        //ArtikelID aus dem Form holen
        $articleId = $_POST['id'];
        //Userdaten in Datenbank einfügen
        $sql = "INSERT INTO warenkorb (user, artikel, anzahl) VALUES ('2', '$articleId', '1');";

        $webshopcon->query($sql);
        
        mysqli_close($webshopcon);

        header("Location: artikelpage.php");
    } catch (Exception $e){
        echo "Something went wrong while connecting with database.";
    }
   
    //header("Location: artikelpage.php");



?>