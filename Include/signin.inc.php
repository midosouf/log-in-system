<?php 

    if(isset($_POST["submit"])){

        $uid = $_POST["uid"];
        $pass = $_POST["pass"];

        include "../Classes/dbh.classes.php";
        include "../Classes/signin.classes.php";
        include "../Controller/signinctr.classes.php";

        $signin = new signinctr($uid, $pass);

        $signin->signinUser();

        header("location: ../index.php?error=none");
    }