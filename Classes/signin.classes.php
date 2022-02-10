<?php
    class signin extends Dbh{

        protected function getUser($uid, $pass){
            $stmt = $this->connect()->prepare("select * from person where ID = ? OR FName = ?");

            if(!$stmt->execute(array($uid, $uid))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = NULL;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPwd = password_verify($pass, $user[0]["pass"]);

            if($checkPwd == false){
                $stmt = NULL;
                header("location: ../index.php?error=wrongpassword");
                exit();
            }elseif($checkPwd == true){
                session_start();

                $_SESSION["userId"] = $user[0]["ID"];
                $_SESSION["userName"] = $user[0]["FName"];
                
                $stmt = null;
            }

            $stmt = null;

        }

    }