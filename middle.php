<?php
    session_start();
    require_once("pdo.php");
    if(!isset($_SESSION['id'])||$_SESSION['id']!=1)
    {
        die("ERROR 403 ACCESS DENIED");
    }
    
?>
<html>
<body>
You're Signed In Successfully
<a href="logout.php">logout</a>
</body>
</html>