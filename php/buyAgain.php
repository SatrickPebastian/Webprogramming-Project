<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    sleep(1);

    //Verbindung herstellen
    $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                    
    if(!$webshopcon){
        echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
        echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    $userId = $_SESSION['id'];
    $orderId = $_POST['hiddenBuyAgain'];
    

    $sql = "SELECT id, userid, date, artikelnamen, gesamteSumme, versandOption FROM bestellungen WHERE id = '$orderId';"; 
    $result = $webshopcon->query($sql);

    $row = $result->fetch_assoc();

    $newOrderId = $row['id'];
    $newOrderUserId = $row['userid'];
    $newOrderDate = ''. date("d.m.Y").', '.date("H:i").' Uhr';;
    $newOrderNames = $row['artikelnamen'];
    $newOrderSum = $row['gesamteSumme'];
    $newOrderOption = $row['versandOption'];

    //Neue Bestellung einfügen
    $sql = "INSERT INTO bestellungen (userid, date, artikelnamen, gesamteSumme, versandOption) VALUES ('$newOrderUserId', '$newOrderDate', '$newOrderNames', '$newOrderSum', '$newOrderOption');";
    $result = $webshopcon->query($sql);


    //Userdaten auslesen um sie anschließend dem PHPMailer zu übergeben
    $sql = "SELECT id, firstname, lastname, username, email, street, stadt, plz FROM user WHERE id = '$userId';";
    $result = $webshopcon->query($sql);
    $row = $result->fetch_assoc();
    
    $userMail = $row['email'];
    $userWholeName = $row['firstname'].' '.$row['lastname'];


    //Inhalt der E-Mail
    $body = "Hallo ".$userWholeName."<br>"."Vielen Dank für Ihre Bestellung bei GameShark. Ihre Bestellung: <br>".$newOrderNames."<br>".$newOrderSum."<br>".$newOrderOption."<br> Ihre Bestellung wird an folgende Adresse versandt: <br>".$row['street']." ".$row['stadt']." ".$row['plz'].""; 


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

    $mail->send();


    sleep(3);

    mysqli_close($webshopcon);
    header("Location: orders.php");




?>