<?php

if(isset($_POST["submit"])){
    $uid = $_POST["uid"];
    $fname = $_POST["name"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];

    include "../Classes/dbh.classes.php";
    include "../Classes/signup.classes.php";
    include "../Controller/signupctr.classes.php";
    
    $signup = new signupContr($uid, $fname, $pass, $repass);

    $signup->signupUser();

    header("location: ../index.php?error=none");
}