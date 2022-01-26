<?php


class Signup extends DbhClass
{
    protected function setuser($username,$pwd,$email){
        $stmt=$this->connect()->prepare('INSERT INTO `users`(`username`, `password`, `e-mail`) VALUES (?,?,?);');
        $hashedpass=password_hash($pwd,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($username,$hashedpass,$email))){
            $stmt=null;
            header('location:../index.php?error=stmtfailed');
            exit();
        }
        $stmt=null;
    }
    protected function checkuser($username,$email){
        $stmt=$this->connect()->prepare('SELECT * FROM `users` WHERE `username`=? OR `e-mail`=?;');
        if(!$stmt->execute(array($username,$email))){
            $stmt=null;
            header('location:../index.php?error=stmtfailed');
            exit();
        }
        $resultcheck=true;
        if($stmt->rowCount()>0){
            $resultcheck=false;
        }else{
            $resultcheck=true;
        }
        return $resultcheck;
    }


}