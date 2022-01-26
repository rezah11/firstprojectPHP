<?php


class logincontroller extends loginclass
{
    public $username;
    public $pwd;
    function __construct($username,$pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

     function loginuser(){
        if($this->emptyinput()==false){
            header('location:../index.php?error=emptyinput');
            exit();
        }

        $this->getuser($this->username,$this->pwd);
    }
    function emptyinput(){
        $result;
        if(empty($this->username)||empty($this->pwd)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

}