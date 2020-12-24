<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $sFirstname="";
    $sLastname="";
    $sUsername="";
    $sEmail="";
    $sStreet="";
    $sPLZ="";
    $sCity="";
    $sCountry="";


    function zufallspassword() {
        $passwort ="";
        $pool  = "abcdefghijklmnopqrstuvwxyz";
        $pool .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $pool .= "0123456789";
        srand ((double)microtime()*1000000);
        for ($index = 0; $index < 8; $index++) { 
            $passwort .= substr($pool,(rand()%(strlen ($pool))), 1);
        }
        return $passwort;
    }

    $password_tohash = zufallspassword();
    
    //hier muss statt testpasswort hashPassword() durchgeführt werden um das zufällige Passwort zu bekommen
    $sPassword = hash('sha512', $password_tohash);

    if(isset($_POST['txt_vorname'])){
        $sFirstname=$_POST['txt_vorname'];
    }
    if(isset($_POST['txt_nachname'])){
        $sLastname=$_POST['txt_nachname'];
    }
    if(isset($_POST['txt_username'])){
        $sUsername=$_POST['txt_username'];
    }
    if(isset($_POST['txt_email'])){
        $sEmail=$_POST['txt_email'];
    }
    if(isset($_POST['txt_stadt'])){
        $sStadt=$_POST['txt_stadt'];
    }
    if(isset($_POST['txt_plz'])){
        $sPLZ=$_POST['txt_plz'];
    }
    if(isset($_POST['txt_straße'])){
        $sStreet=$_POST['txt_straße'];
    }
    

    try{
        $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
    
        if(!$wbsconnection){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        $sql= "INSERT INTO user(firstname, lastname, username, password, email, street, plz, stadt, status) VALUES ('$sFirstname', '$sLastname', '$sUsername', '$sPassword', '$sEmail', '$sStreet', '$sPLZ', '$sStadt', 'offline')";
        $result = $wbsconnection->query($sql);

        mysqli_close($wbsconnection);

        $body = "Hallo ".$sFirstname."!<br><br>"."Vielen Dank für deine Registrierung bei GameShark.<br><br>Dein vorläufiges Passwort lautet: ".$password_tohash."<br> Sobald du dich zum ersten Mal einloggst wirst du von uns gebeten, ein eigenes Passwort zu vergeben.";


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
        $mail->addAddress($sEmail);
        $mail->Subject = "Ihre Registrierung bei GameShark";
        $mail->Body = $body;

        if($mail->send()){
            sleep(2);
            header("Location: ../signup.html");
        }else {
            echo "Etwas ist schiefgelaufen: <br><br>" . $mail->ErrorInfo;
        }

    }catch(Exception $e){
        echo "FEHLER beim verbinden der Datenbank";
    }
    
?>



 