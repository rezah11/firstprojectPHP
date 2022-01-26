<?php


class SignupControllerClass extends Signup
{
    public $username;
    public $pwd;
    public $repwd;
    public $email;
    function __construct($username,$pwd,$repwd,$email)
    {
        $this->username=$username;
        $this->pwd=$pwd;
        $this->repwd=$repwd;
        $this->email=$email;
    }
    public function signupuser(){
        if($this->emptyinput()==false){
            header('location:../index.php?error=emptyinput');
            exit();
        }
        if($this->invalidid()==false){
            header('location:../index.php?error=');
            exit();
        }
        if($this->invalidemail()==false){
            header('location:../index.php?error=usercheck');
            exit();
        }
        if($this->pwdmatch()==false){
            header('location:../index.php?error=pwdnotequal');
            exit();
        }
//        if($this->chkuser()==false){
//            header('location:../index.php?error=usercheck');
//            exit();
//        }
        $this->setuser($this->username,$this->pwd,$this->email);
    }
    //کنترل کننده های خطا را وارد میکنیم مثلا چک کردن خالی یا پر بودن اینپوت هامون و دادن الگو به هر کدام و...
    private function emptyinput(){
        $result;
            if(empty($this->username)||empty($this->pwd)||empty($this->repwd)||empty($this->email)){
                $result=false;
            }else{
                $result=true;
            }
            return $result;
    }
    private function invalidid(){
        $result;
        if (!preg_match("/^[A-Za-z][A-Za-z0-9]*$/", $this->username)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    function invalidemail(){
        $result;
        if ( !filter_var($this->email,FILTER_VALIDATE_EMAIL) ){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    function pwdmatch(){
        $result;
        if ($this->pwd !== $this->repwd ){
            $result=false;
        }else{
            $result=true;
        }
        return $result;

    }
    function chkuser(){
        $result;
        if ($this->checkuser($this->username,$this->email)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;

    }
}