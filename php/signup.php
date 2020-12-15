<?php
    
    /*session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }*/
    

    $sFirstname="";
    $sLastname="";
    $sUsername="";
    $sEmail="";
    $sStreet="";
    $sPLZ="";
    $sCity="";
    $sCountry="";
    //$iSessionUserId = $_SESSION['id'];

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
    
            
            $sql= "INSERT INTO user(firstname, lastname, username, email, stadt, plz, country) VALUES ('$sFirstname', '$sLastname', '$sUsername', '$sEmail', '$sStreet', '$sPLZ', '$sStadt', '$sCountry')";
            
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
 