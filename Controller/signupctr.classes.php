<?php

class signupContr extends signup{

    private $uid;
    private $fname;
    private $pass;
    private $repass;

    public function __construct($uid, $fname, $pass, $repass){
        $this->uid = $uid;
        $this->fname = $fname;
        $this->pass = $pass;
        $this->repass = $repass;
    }

    public function signupUser(){
        if($this->emptyInput() == false){

            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false){
            header("location: ../index.php?error=userid");
            exit();
        }

        if($this->invalidName() == false){
            header("location: ../index.php?error=name");
            exit();
        }

        if($this->pwdMatch() == false){
            header("location: ../index.php?error=pass");
            exit();
        }

        if($this->uidTokenCheck() == false){
            header("location: ../index.php?error=uidToken");
            exit();
        }

        $this->setUser($this->uid, $this->fname, $this->pass);
        

    }

    function emptyInput(){
        $result = false;
        if( empty($this->uid) || empty($this->fname) || empty($this->pass) || empty($this->repass) ){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    function invalidUid(){
        $result = false;
        if(!preg_match("/^[0-9]*$/", $this->uid)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    function invalidName(){
        $result = false;
        if(!preg_match('/^[a-zA-Z]*$/', $this->fname)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result = false;
        if($this->pass !== $this->repass){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function uidTokenCheck(){
        $result = false;
        if(!$this->checkUser($this->uid, $this->fname)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }


}