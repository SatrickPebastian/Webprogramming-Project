<?php
    session_start();
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
     $orderId = $_POST['buyAgainButton'];
     echo $_POST['buyAgainButton'];

     $sql = "SELECT id, userid, date, artikelnamen, gesamteSumme FROM bestellungen WHERE id = '$orderId';"; 
     $result = $webshopcon->query($sql);

     $row = $result->fetch_assoc();

     $newOrderId = $row['id'];
     $newOrderUserId = $row['userid'];
     $newOrderDate = ''. date("d.m.Y").', '.date("H:i").' Uhr';;
     $newOrderNames = $row['artikelnamen'];
     $newOrderSum = $row['gesamteSumme'];

     $sql = "INSERT INTO bestellungen (userid, date, artikelnamen, gesamteSumme) VALUES ('$newOrderUserId', '$newOrderDate', '$newOrderNames', '$newOrderSum');";
     $result = $webshopcon->query($sql);

     mysqli_close($webshopcon);
     header("Location: orders.php");




?>