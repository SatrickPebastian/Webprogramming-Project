<?php
    session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }

    $sFirstname="";
    $sLastname="";
    $sPassword="";
    $sEmail="";
    $sCity="";
    $sPLZ="";
    $sStreet="";
    $sCountry="";
    $iSessionUserId = $_SESSION['id'];

    if(isset($_POST['txt_Vorname'])){
        $sFirstname=$_POST['txt_Vorname'];
    }
    if(isset($_POST['txt_Nachname'])){
        $sLastname=$_POST['txt_Nachname'];
    }
    if(isset($_POST['txt_Password'])){
        $sPassword=$_POST['txt_Password'];
    }
    if(isset($_POST['txt_Email'])){
        $sEmail=$_POST['txt_Email'];
    }
    if(isset($_POST['txt_Stadt'])){
        $sCity=$_POST['txt_Stadt'];
    }
    if(isset($_POST['txt_PLZ'])){
        $sPLZ=$_POST['txt_PLZ'];
    }
    if(isset($_POST['txt_Straße'])){
        $sStreet=$_POST['txt_Straße'];
    }
    if(isset($_POST['select_Land'])){
        $sCountry=$_POST['select_Land'];
    }

        try{
            $fpconnection = mysqli_connect("127.0.0.1", "root", "", "fportal");
        
            if(!$fpconnection){
                echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
                echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
    
            $sql= "INSERT INTO fpfriends(uid, lastname, firstname, city, studycourse, semester) VALUES ($iSessionUserId, '$sLastname', '$sFirstname', '$sCity', '$sStudyCourse', '$sSemester')";
            
            echo $sql;

            if($fpconnection->query($sql) === TRUE){
                echo "Super! Regestrierung hat geklappt!";
            }else{
                echo "Fehler beim Registrieren!: " . $fpconnection->error;
            }
    
            mysqli_close($fpconnection);
    
        }catch(Exception $e){
            echo "FEHLER beim verbinden der Datenbank";
        }

        header("Location: XYZ");
        
?>