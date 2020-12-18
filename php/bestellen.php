

<?php
    


    try {

        //Bewirkt Zeitverzögerung der Form-Submission. Dadurch wird der Loader auf der warenkorb.php Seite sichtbar.
        //Ohne diese Zeile würde der Loader sichtbar werden aber durch die Form-Submission direkt unterbrochen.
        sleep(2);
        
        //Verbindung herstellen
        $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
        
        if(!$webshopcon){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        
        //Hier wurde die Summe übergeben, welche anschließend der Bestellung mitgegeben werden soll.
        $summeAllerArtikel = $_POST['cartId'];
        
        $sql = "SELECT user, artikel, anzahl, title FROM warenkorb w, artikel a WHERE w.artikel = a.id;";
        $result = $webshopcon->query($sql);

        

        $stringAlleArtikel = '';
        $count = 1;

        $userId = '';
        $dateAndTime = ''. date("d.m.Y").', '.date("H:i").' Uhr';
        
        //Zusammenfügen aller Titel in einen String --> $stringAlleArtikel
        while($row = $result->fetch_assoc()){
            $userId = $row['user'];
            if($count < $result->num_rows){
                $count++;
                $stringAlleArtikel = $stringAlleArtikel.$row['title'].' ('.$row['anzahl'].'x)'.', ';
            } else {
                $stringAlleArtikel = $stringAlleArtikel.$row['title'].' ('.$row['anzahl'].'x)';
            }
        }
       


        $sql = "INSERT INTO bestellungen (userid, date, artikelnamen, gesamteSumme) VALUES ('$userId', '$dateAndTime', '$stringAlleArtikel', '$summeAllerArtikel');";
        $result = $webshopcon->query($sql);

        $sql = "DELETE FROM warenkorb";
        $result = $webshopcon->query($sql);




        
        
        
        mysqli_close($webshopcon);

        header("Location: warenkorb.php");
    } catch (Exception $e){
        echo "Something went wrong while connecting with database.";
    }


?>