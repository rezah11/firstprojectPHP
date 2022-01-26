<?php
if (isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['pwd'];
    $repass=$_POST['repwd'];
}
include '../classes/DbhClass.php';
include '../classes/Signup.php';
include '../classes/SignupControllerClass.php';
$signup=new SignupControllerClass($username,$pass,$repass,$email);
$signup->signupuser();
header('location:../index.php?error=none');
