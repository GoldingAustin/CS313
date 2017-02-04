<?php
session_start();
//$user = "user=austingolding";
//$db = "dbname=austingolding";
//$host = "host=localhost";
//$port = "port=5432";


extract(parse_url($_ENV["DATABASE_URL"]));
$conn = pg_connect("user=$user password=$pass host=$host dbname=" . substr($path, 1) . " sslmode=require");

//$conn = pg_connect("$host $port $db $user");
//if(!$conn){
//    //echo "Error : Unable to open database\n";
//} else {
//    // echo "Opened database successfully\n";
//}
?>