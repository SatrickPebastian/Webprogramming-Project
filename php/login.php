<?php
    
    session_start();

    $sUsername="";
    $sPassword="";

    $bUsernameAndPassword=false;

    $bLoginSuccess=false;

    $row = null;

    if(isset($_POST['username'])){
        $sUsername=$_POST['username'];
    }
    if(isset($_POST['password'])){
        $sPassword=$_POST['password'];
    }

    if($sUsername=="" || $sPassword==""){

    }else{
        $bUsernameAndPassword=true;
    }

    if($bUsernameAndPassword){
        try{
            $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");

            if(!$wbsconnection){
                echo "Fehler: konnte nicht mit MariaDB verbinden." .PHP_EOL;
                echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }

           
            $hashedPassword = hash('sha512', $sPassword);
            
            $sql = "SELECT id, firstname, lastname, username, email, street, stadt, plz FROM user where username='$sUsername' and password='$hashedPassword'";

            $result = $wbsconnection->query($sql);

            $userId = '';

            if($result->num_rows > 0){
                $bLoginSuccess = true;

                while($row = $result->fetch_assoc()){

                    $_SESSION['id'] = $row["id"];
                    $_SESSION['firstname'] = $row["firstname"];
                    $_SESSION['lastname'] = $row["lastname"];
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['login'] = 111;
                    $_SESSION['zeit'] = time();
                    $userId = $row['id'];
                }
            }else{
                echo "0 Treffer!";
            }

            //Auflösung des Benutzers speichern
            $userResolutionWidth = $_POST['userResolutionWidth'];
            $userResolutionHeight = $_POST['userResolutionHeight'];
            
            $userResolutionConcat = $userResolutionWidth. " x ".$userResolutionHeight;

            //Login in Tabelle online speichern
            $sql = "UPDATE user SET status = 'online', resolution = '$userResolutionConcat' WHERE id = '$userId';";
            $result = $wbsconnection->query($sql);

            //Holen des letzten logouts um zu prüfen, ob das der erste Login ist oder nicht
            $sql = "SELECT firstLogin FROM user WHERE id = '$userId';";
            $result = $wbsconnection->query($sql);
            $row = $result->fetch_assoc();

            

            mysqli_close($wbsconnection);
            

        }catch(Exception $e){
            echo "FEHLER beim verbinden der Datenbank:".$e;
        }
    }



    if($bLoginSuccess && ($row['firstLogin'] == 'no')){
        header("Location: startpage.php");
        }else if($bLoginSuccess && ($row['firstLogin'] == 'yes')){
            header("Location: newPassword.php");
        }else {
            header("Location: ../login.html");
        }
        
    

?>