<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Log IN</title>

</head>
<body>
<?php
    if(isset($_SESSION["userId"])){
        echo $_SESSION["userId"] . " " . $_SESSION["userName"];
    }else{
        echo "NO SESSION";
    }
?>
<div class="signup">
    
        <form action="include/signup.inc.php" method="post">
        <h1>SignUP</h1>
            <input type="text" name="uid" id="" class="" placeholder="ID">
            <input type="text" name="name" id="" class="" placeholder="FullName">
            <input type="text" name="pass" id="" class="" placeholder="Password">
            <input type="text" name="repass" id="" class="" placeholder="ReapetPassword">
            <input type="submit" value="submit" name="submit" class="submit">
        </form>
    </div>
    <div class="login">
      
        <form action="include/signin.inc.php" method="post">
        <h1>Login</h1>
            <input type="text" name="uid" id="" class=""  placeholder="ID Or Name">
            <input type="input" name="pass" id="" class=""  placeholder="Password">
            <input type="submit" value="submit" name="submit" class="submit">
        </form>
    </div>

    <div class="logout">
      
        <form action="include/signout.inc.php" method="post">
        <h1>logout</h1>
            <input type="submit" value="logout" name="submit" class="submit">
        </form>
    </div>
    
</body>
</html>