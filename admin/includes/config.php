<?php

// localhost credentials
$host = "localhost";
$db_name = "gold";
$username = "root";
$password = "";


// hosting credentials
// $host = "ewiln001.mysql.guardedhost.com";
// $db_name = "ewiln001_gold";
// $username = "ewiln001_gold";
// $password = "pw7*CnjH59";

try {
   $db= new PDO("mysql:host={$host};dbname={$db_name};",$username,$password) or die("Could not connect database");
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
