<?php

class Dbh{

      protected function connect(){
    try{
        $host = "localhost";
        $dbname = "test";
        $username = "root";
        $pass = "";
        $dbh = new PDO("mysql:host=localhost;dbname=test", $username, $pass);
        return $dbh;
        //check connection
        if($db ->connect_error){
            die("connection failed. " . $db ->connect_error);
        }
       
       
    }
    catch(PDOException $e){
      $error =  $e->getMessage();
      print "<p>error messege: $error</p><br/> ";
      die();
    }
      }  
    

}
?>