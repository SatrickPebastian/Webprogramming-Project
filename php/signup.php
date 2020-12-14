<?php
    session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }

    $sFirstname="";
    $sLastname="";
    $sUsername="";
    $sEmail="";
    $sStreet="";
    $sPLZ="";
    $sCity="";
    $sCountry="";
    $iSessionUserId = $_SESSION['id'];

    if(isset($_POST['txt_Vorname'])){
        $sFirstname=$_POST['txt_Vorname'];
    }
    if(isset($_POST['txt_Nachname'])){
        $sLastname=$_POST['txt_Nachname'];
    }
    if(isset($_POST['txt_Username'])){
        $sUsername=$_POST['txt_Username'];
    }
    if(isset($_POST['txt_Email'])){
        $sEmail=$_POST['txt_Email'];
    }
    if(isset($_POST['txt_Straße'])){
        $sStreet=$_POST['txt_Straße'];
    }
    if(isset($_POST['txt_PLZ'])){
        $sPLZ=$_POST['txt_PLZ'];
    }
    if(isset($_POST['txt_Stadt'])){
        $sCity=$_POST['txt_Stadt'];
    }
    if(isset($_POST['txt_Land'])){
        $sCountry=$_POST['txt_Land'];
    }
    //if(isset($_POST['checkboxes_studiengang'])){
        //$sStudyCourse=$_POST['checkboxes_studiengang'];
    //}
    //if(isset($_POST['radios_semester'])){
        //$sSemester=$_POST['radios_semester'];
    //}

        try{
            $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
        
            if(!$wbsconnection){
                echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
                echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
    
            
            $sql= "INSERT INTO user(uid, firstname, lastname, username, email, street, plz, city, country) VALUES ($iSessionUserId, '$sFirstname', '$sLastname', '$sUsername', '$sEmail', '$sStreet', '$sPLZ', '$sCity')";
            
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

        //header("Location: friends_overview.php");
        




                        /*$sFirstname="";
                        $sLastname="";
                        $sUsername="";
                        $sEmail="";
                        $sStreet="";
                        $sPLZ="";
                        $sCity="";
                        $sCountry="";

                        $iUserId = 0;

                        if(isset($_GET['uid'])){
                            $iUserId=$_GET['uid'];
                        }
                        if($iUserId!=0){
                            try{
                                $wbsconnection = mysqli_connect("127.0.0.1", "root", "", "fportal");
                                
                                if(!$wbsconnection){
                                    echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
                                    echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                                    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                                    exit;
                                }

                                $sql= "SELECT * FROM webshopdb WHERE id=$iUserId";
                                $result=$wbsconnection->query($sql);

                                while($row = $result->fetch_assoc()){
                                    $sFirstname= $row["firstname"];
                                    $sLastname=$row["lastname"];
                                    $sUsername=$row["username"];
                                    $sEmail=$row["email"];
                                    $sStreet=$row["street"];
                                    $sPLZ=$row["plz"];
                                    $sCity=$row["city"];
                                    $sCountry=$row["country"];
                                }

                                mysqli_close($wbsconnection);

                            }catch(Exception $e){
                                echo "FEHLER beim verbinden der Datenbank";
                            }
                        }*/
                    ?>
 