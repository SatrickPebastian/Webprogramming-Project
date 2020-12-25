

<?php
    
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    try {

        //Bewirkt Zeitverzögerung der Form-Submission. Dadurch wird der Loader auf der warenkorb.php Seite sichtbar.
        //Ohne diese Zeile würde der Loader sichtbar werden aber durch die Form-Submission direkt unterbrochen.
        sleep(1);
        
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
        //Versandoption
        $versandOption = $_POST['sendOrderButton'];
        //UserID holen
        $userId = $_SESSION['id'];
        
        $sql = "SELECT user, artikel, anzahl, title FROM warenkorb w, artikel a WHERE w.artikel = a.id and user = '$userId';";
        $result = $webshopcon->query($sql);

        

        $stringAlleArtikel = '';
        $count = 1;

      
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
       


        $sql = "INSERT INTO bestellungen (userid, date, artikelnamen, gesamteSumme, versandOption) VALUES ('$userId', '$dateAndTime', '$stringAlleArtikel', '$summeAllerArtikel', '$versandOption');";
        $result = $webshopcon->query($sql);


        //Userdaten auslesen um sie anschließend dem PHPMailer zu übergeben
        $sql = "SELECT id, firstname, lastname, username, email, street, stadt, plz FROM user WHERE id = '$userId';";
        $result = $webshopcon->query($sql);
        $row = $result->fetch_assoc();


        
        $userMail = $row['email'];
        $userWholeName = $row['firstname'].' '.$row['lastname'];
        $body = "Hallo ".$userWholeName."<br>"."Vielen Dank für Ihre Bestellung bei GameShark. Ihre Bestellung: <br>".$stringAlleArtikel."<br>".$summeAllerArtikel."<br>".$versandOption."<br> Ihre Bestellung wird an folgende Adresse versandt: <br>".$row['street']." ".$row['stadt']." ".$row['plz']."";

        //Mail verschicken


        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer(true);

        //SMTP Einstellungen
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "gameSharkReutlingen@gmail.com";
        $mail->Password = "gameshark123";
        $mail->Port = 465; // 587 für tls
        $mail->SMTPSecure = "ssl"; //oder tls

        //Email Einstellungen
        $mail->isHTML(true);
        $mail->setFrom("gameSharkReutlingen@gmail.com", "GameShark-Team");
        $mail->addAddress($userMail);
        $mail->Subject = "Ihre Bestellung bei GameShark";
        $mail->Body = $body;

        if($mail->send()){
            echo "Email versendet!";
        }else {
            echo "Etwas ist schiefgelaufen: <br><br>" . $mail->ErrorInfo;
        }

        
        //Warenkorb leeren
        $sql = "DELETE FROM warenkorb WHERE user = '$userId'";
        $result = $webshopcon->query($sql);
        
        
        
        mysqli_close($webshopcon);

        header("Location: warenkorb.php");
    } catch (Exception $e){
        echo "Something went wrong while connecting with database.";
    }


?>