<?php
    session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neues Passwort</title>

    <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link href="fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d36fdbef7d.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/karussell.css" rel="stylesheet">
    <link href="../css/loader.css" rel="stylesheet">

    <!-- Sweet alert import -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    
<header>
</header>
<main>
    <div class="jumbotron">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading display-4">Bitte wählen Sie ein Passwort</h1>
            </div>
        </section>
    </div>
    <br><br>
    <form action="firstPassword.php" method="post" onsubmit="return checkPasswordEquality()">
        <div class="form-row d-flex flex-row justify-content-center">
            <div class="p2">
                <label for="password1">Ihr Passwort:</label> 
                <input class="form-control mr-5" type="password" id="password1" name="password1"> 
            </div>
            <div class="p2">
                <label for="password2" class="ml-5">Passwort bestätigen:</label>
                <input class="form-control ml-5" type="password" id="password2" name="password2">
            </div>
        </div>
        <div class="form-row d-flex flex-row justify-content-center">
                <button type="submit" id="sendFirstPasswordButton" class="btn btn-success mt-5">Bestätigen</button>
        </div>
    </form>
</main>

<script type="text/javascript">
    function checkPasswordEquality(){
        let pwField1 = $('#password1');
        let pwField2 = $('#password2');

        if(pwField1.val() != pwField2.val()){
            swal({
                title:"Fehler",
                text:"Fehlerhafte Passworteingabe",
                icon:"error"
            });
            return false;

        }else {
            return true;
        }
    }
</script>

</body>
</html>