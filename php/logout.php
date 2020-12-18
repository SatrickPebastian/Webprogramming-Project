<?
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
    <script src="../JavaScript/jquery-2.1.4.min.js"></script>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
    <div class="container-fluid">
        <center><h1>Bis bald!</h1></center>
    </div>

    <script src="../Bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>

<?php

    session_start();
    $_SESSION = array();

    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
    }

    session_destroy();
?>

