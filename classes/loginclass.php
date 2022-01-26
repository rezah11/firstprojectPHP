<?php


class loginclass extends DbhClass
{
    protected function getuser($username,$pwd){
        $stmt=$this->connect()->prepare('SELECT * FROM `users` WHERE `username`=? OR `e-mail`=?');
        if(!$stmt->execute(array($username,$pwd))){
            $stmt=null;
            header('location:../index.php?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt=null;
            header('location:../index.php?error=notFoundUser');
            exit();
        }
        $pwdhashed=$stmt->fetchAll();//بررسی شود شاید به خطا بخورد چون پیش فرضش مشخص باید شود که شده است در dbh
        $checkedpwd=password_verify($pwd,$pwdhashed[0]['password']);
        if($checkedpwd==false){
            $stmt=null;
            header('location:../index.php?error=nullpassword');
            exit();
        }else if ($checkedpwd==true){
            $stmt=$this->connect()->prepare('SELECT * FROM `users` WHERE `username`=? OR `e-mail`=? AND  `password`=?');
            if(!$stmt->execute(array($username,$username,$pwd))){
                $stmt=null;
                header('location:../index.php?error=notFoundUser');
                exit();
            }
            $user=$stmt->fetchAll();
            session_start();
            $_SESSION["userid"]=$user[0]["id"];
        }
        $stmt=null;
    }
}