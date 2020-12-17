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
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
</body>
</html>