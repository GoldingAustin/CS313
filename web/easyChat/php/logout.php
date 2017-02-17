<?php
session_start();
include("database.php");
$myusername = $_SESSION['login_user'];
$sql = "UPDATE easychat.user SET room_id = 'NULL' WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
unset($_SESSION['login_user']);
header("location: login.php");
?>