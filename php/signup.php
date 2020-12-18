<?php

    $sFirstname="";
    $sLastname="";
    $sUsername="";
    $sEmail="";
    $sStreet="";
    $sPLZ="";
    $sCity="";
    $sCountry="";


    function hashPassword() {
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

    $password_hash = /* hier vielleicht echo */ hashPassword();
    
    //hier muss statt testpasswort hashPassword() durchgeführt werden um das zufällige Passwort zu bekommen
    $sPassword = hash('sha512', $password_hash);

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
    if(isset($_POST['select_land'])){
        $sCountry=$_POST['select_land'];
    }   

    try{
        $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
    
        if(!$wbsconnection){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        $sql= "INSERT INTO user(firstname, lastname, username, password, email, street, plz, stadt, country) VALUES ('$sFirstname', '$sLastname', '$sUsername', '$sPassword', '$sEmail', '$sStreet', '$sPLZ', '$sStadt', '$sCountry')";
        
        echo $sql;

        if($wbsconnection->query($sql) === TRUE){
            echo "Super! Registrierung erfolgreich!";
        }else{
            echo "Fehler beim Registrieren!: " . $wbsconnection->error;
        }

        mysqli_close($wbsconnection);

    }catch(Exception $e){
        echo "FEHLER beim verbinden der Datenbank";
    }

    //header("Location: ../login.html");
    
    include_once 'phpmailer/PHPMailerAutoload.php';
    $oMailer = new PHPMailer;
    $oMailer->CharSet = 'UTF-8';

    $oMailer->isSMTP();
    $oMailer->Host = 'localhost';
    $oMailer->SMTPAuth = true;
    $oMailer->Username = 'Svenja_Ines.Bystrzinski@student.reutlingen-university.de';
    //$oMailer->Username = 'phprocks@example.com';
    $oMailer->Password = '';
    $oMailer->SMTPSecure = 'tls';
    $oMailer->Port = 587;

    $oMailer->From = 'Svenja_Ines.Bystrzinski@student.reutlingen-university.de';
    //$oMailer->From = 'phprocks@example.com';
    $oMailer->FromName = 'Gameshark-Team';
    //$oMailer->FromName = 'PHProcks!';
    $oMailer->addAddress( 'email' , $sFirstname + $sLastname );
    //$oMailer->addAddress( 'max.mustermann@example.com', 'Max Mustermann' );

    $oMailer->isHTML( true );
    $oMailer->Subject = 'Regestrierungsbestätigung Gameshark';
    //hier muss statt firstname die belegung von firstname ausgegeben werden
    $oMailer->Body = '<h1>Willkommen bei Gameshark' + $sFirstname + $sLastname +'!</h1><h2>Wir freuen uns, Ihnen mitteilen zu dürfen, dass Sie nun offiziell Kunde bei uns sind! <br> Mit freundlichen Güßen <br> Ihr Gameshark-Team</h2>';
    $oMailer->AltBody = strip_tags( $oMailer->Body );


    if ( !$oMailer->send() ) {

    echo 'Something\'s went wrong!';
    exit;

    }

    echo 'Mail with PHPMailer sent successfully!';
?>
 