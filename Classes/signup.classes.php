<?php 
    class signup extends Dbh {

    protected function setUser($uid, $fname, $pass){
        $stmt = $this->connect()->prepare("INSERT INTO `person`(`ID`, `FName`, `Pass`) VALUES (?, ?, ?);");
        $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $fname, $hashedPwd))){
            $stmt = null;
            header("location: ../index.php?error=stmtinsertfaild");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $fname){
        $stmt = $this->connect()->prepare('select * from person where ID = ? OR FName = ? ');
        
        if(!$stmt->execute(array($uid, $fname))){
            $stmt = null;
            header("location: ../index.php?error=stmtfaild");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultcheck = false;
        }else{
            $resultCheck = true;
        }

        return $resultCheck;
    }
}