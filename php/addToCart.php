<?php 

    sleep(1);
    session_start();

    if($_SESSION['login']!= 111){
        header("Location: login.php");
    }
        
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

        $sql = "SELECT anzahl, artikel FROM warenkorb WHERE artikel = '$articleId';";
        $result = $webshopcon->query($sql);
        $row = $result->fetch_assoc();

        if($row == null){
            
            //Userdaten erstmalig in Datenbank übergeben
            $sql = "INSERT INTO warenkorb (user, artikel, anzahl) VALUES ('2', '$articleId', '1');";
            $webshopcon->query($sql);
            
        } else {
            
            //Erhöhe Anzahl um eins, wenn Produkt bereits im Warenkorb liegt.
            $aktuelleAnzahl = $row['anzahl'];
            $neueAnzahl = $aktuelleAnzahl + 1;
            
            $sql = "UPDATE warenkorb SET anzahl = '$neueAnzahl' WHERE artikel = '$articleId';";
            $webshopcon->query($sql);
        }

        
        
        
        mysqli_close($webshopcon);

        header("Location: artikelpage.php");
    } catch (Exception $e){
        echo "Something went wrong while connecting with database.";
    }
   
    //header("Location: artikelpage.php");



?>