<?
session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }

    $passwort ="";

    if(isset($_POST['txt_password1'])){
        $passwort=$_POST['txt_password1'];
    }
    $sPasswort = hash('sha512', $passwort);

    try{
        $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
    
        if(!$wbsconnection){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        $sql = "UPDATE `user` SET 'password' = '$sPasswort' WHERE 'user'.'id' = 7"; // id auslesen 
        
        echo $sql;

        if($wbsconnection->query($sql) === TRUE){
            echo "Super! Passwordänderung erfolgreich!";
        }else{
            echo "Fehler beim Ändern des Passworts!: " . $wbsconnection->error;
        }

        mysqli_close($wbsconnection);

    }catch(Exception $e){
        echo "FEHLER beim verbinden der Datenbank";
    }
?>
 
