<?php

    session_start();
    require_once("pdo.php");
    if(!isset($_SESSION['id'])||$_SESSION['id']!=1)
    {
        die("ERROR 403 ACCESS DENIED");
    }
    session_destroy();
  header('Location: login.php');
?>