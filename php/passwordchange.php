<?
session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }
?>