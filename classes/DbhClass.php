	<?php


class DbhClass
{

protected function connect(){
    try{
        $username='root';
        $pwd='';
        $pdo=new PDO('mysql:host=localhost;dbname=login',$username,$pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }catch(PDOException $e) {
        print "error" . $e->getMessage() . "<br>";
        die();
    }

}
}