<?php
class signinctr extends signin{

    private $uid;
    private $pass;

    public function __construct($uid, $pass)
    {
        $this->uid = $uid;
        $this->pass = $pass;
    }

    public function signinUser(){

        if($this->emptyInput() == false){

            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false){
            header("location: ../index.php?error=userid");
            exit();
        }

        $this->getUser($this->uid,  $this->pass);
    }

    function emptyInput(){
        $result =false;

        if( !empty($this->uid) || !empty($this->pass)){
            $result = true;
        }

        return $result;
    }

    function invalidUid(){
        $result = false;

        if( preg_match("/^[0-9]*$/", $this->uid) || preg_match("/^[a-zA-Z]*$/", $this->uid)){
            $result = true;
        }
        return $result;
    }


}