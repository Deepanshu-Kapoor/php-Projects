<?php
$host="localhost";
$dbname="mydatabase";
$dbusername="root";
$dbpassword="";
try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//By setting PDO::ATTR_ERRMODE to PDO::ERRMODE_EXCEPTION, you configure PDO to throw a PDOException if a database error occurs.
}
catch(PDOException $e){
    die("There is an error ".$e->getmessage());
}