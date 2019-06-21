<?php
    session_start();
    require_once('pdo.php');
    $salt='new_ton56*';
    if(isset($_POST['id']) && isset($_POST['pass']))
    {
        unset($_SESSION['id']);
        if ( strlen($_POST['id']) < 1 || strlen($_POST['pass']) < 1 )
        {
            $_SESSION['error'] = "User name and password are required<br>";
            header('Location: message.php');
            return;
        }
        else if($_POST['id']=='admin')
        {
                $check = hash('md5', $salt.$_POST['pass']);
                $uname = "username";
                $pwd = "password";
                $pwd = hash('md5',$salt.$pwd);
                if($pwd == $check)
                {
                    $_SESSION['id'] = '1';
                    header("Location: middle.php");
                    return;
                }
                else
                {
                    $_SESSION['msg'] = "Incorrect ID or Password<br>";
                    $_SESSION['redirect'] = "index.php";
                    header("Location: message.php");  
                    return;
                }
        }
        else
                {
                    $_SESSION['msg'] = "Incorrect ID or Password<br>";
                    $_SESSION['redirect'] = "index.php";
                    header("Location: message.php");  
                    return;
                }
    }
?>
<html>
<body>

                    <form  method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required type="text" name="id" class="form-control" id="username" placeholder="Enter Admin Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required type="password" name="pass" class="form-control" id="password" placeholder="Enter Admin Password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-light btn-block "><strong>LOGIN</strong></button>

                    </form>
</body>
</html>