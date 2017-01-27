<?php
//session_start();
//$user = 'root';
//$password = 'root';
//$db = 'easychat';
//$host = 'localhost:8889';
//$port = 8889;

$conn = pg_connect("host=localhost port=5432 dbname=easychat user=austingolding password=root");

// Create connection
//$conn = new mysqli($host, $user, $password, $db);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
?>