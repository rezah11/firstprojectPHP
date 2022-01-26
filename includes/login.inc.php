<?php
if (isset($_POST['submit1'])){
    $username=$_POST['name'];
    $pass=$_POST['pass'];
}
include '../classes/DbhClass.php';
include '../classes/loginclass.php';
include '../classes/logincontroller.php';
$login=new logincontroller($username,$pass);
$login->loginuser();
header('location:../index.php?error=none');
