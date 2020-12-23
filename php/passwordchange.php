<?
session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }

    $passwort ="";
    $sChangeSuccess=false;

    if(isset($_POST['txt_password1'])){
        $passwort=$_POST['txt_password1'];
    }
    $sPassword = hash('sha512', $passwort);

    try{
        $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
    
        if(!$wbsconnection){
            echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
            echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        $userid=$_SESSION['id'];

        $sql1 = "SELECT id, firstname, lastname, username, email, street, stadt, plz FROM user where id= $userid and password='$sPassword'";
        $result = $wbsconnection->query($sql1);
        if($result->num_rows > 0){
            $sChangeSuccess = true;

            while($row = $result->fetch_assoc()){

                $_SESSION['id'] = $row["id"];
                $_SESSION['firstname'] = $row["firstname"];
                $_SESSION['lastname'] = $row["lastname"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['login'] = 111;
                $_SESSION['zeit'] = time();
            }
        }else{
            echo "0 Treffer!";
        }

        $sql2 = "UPDATE `user` SET 'password' = '$sPassword' WHERE 'user'.'id' = $userid";
        
        echo $sql2;

        if($wbsconnection->query($sql2) === TRUE){
            echo "Super! Passwordänderung erfolgreich!";
        }else{
            echo "Fehler beim Ändern des Passworts!: " . $wbsconnection->error;
        }

        mysqli_close($wbsconnection);

    }catch(Exception $e){
        echo "FEHLER beim verbinden der Datenbank";
    }

?>