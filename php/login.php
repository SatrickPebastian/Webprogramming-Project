<?php
    
    session_start();

    $sUsername="";
    $sPassword="";

    $bUsernameAndPassword=false;

    $bLoginSuccess=false;

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
            $fpconnection = mysqli_connect("127.0.0.1", "root", "", "fportal");

            if(!$fpconnection){
                echo "Fehler: konnte nicht mit MariaDB verbinden." .PHP_EOL;
                echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }


            $sql = "SELECT * FROM user where username='$sUsername' and password='$sPassword'";

            $result = $fpconnection->query($sql);

            if($result->num_rows > 0){
                $bLoginSuccess = true;

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

            mysqli_close($fpconnection);
        

        }catch(Exception $e){
            echo "FEHLER beim verbinden der Datenbank:".$e;
        }
    }

    if($bLoginSuccess){
        header("Location: startpage.php");
    }else{
        header("Location: ../login.html");
    }

?>