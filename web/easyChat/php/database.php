<?php
session_start();
$user = "user=austingolding";
$db = "dbname=austingolding";
$host = "host=localhost";
$port = "port=5432";


extract(parse_url($_ENV["DATABASE_URL"]));
$conn = pg_connect("user=$user password=$pass host=$host dbname=" . substr($path, 1) . " sslmode=require");
 //pg_connect("dbname=dcfekv66t3orlp host=ec2-54-163-246-165.compute-1.amazonaws.com port=5432 user=dxgkrpudzqxphn password=dbb68ad52247be47330ba3c1ae9d5e877ed1ee6a97f3fe33315580982eeef26d sslmode=require");

//$conn = pg_connect("$host $port $db $user");
//if(!$conn){
//    //echo "Error : Unable to open database\n";
//} else {
//   // echo "Opened database successfully\n";
//}

?>