<?php
session_start();

include("database.php");
//if(!$conn){  echo "Error : Unable to open database\n"; }
//return $conn;
$myusername = pg_escape_string($conn, $_POST['name']);
$pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
//$pass = $_POST['pass1'];
//$mypassword = pg_escape_string($conn, $pass);
$sql = "SELECT * FROM `user` WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = pg_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    $error = "Username already exists";
    echo "true";
    return true;
} else {
    $sql = "INSERT INTO `user` (`username`, `password`, `create_time`, `user_id`) VALUES ('$myusername', '$pass', CURRENT_TIMESTAMP, NULL)";
    $result = pg_query($conn, $sql);
    $_SESSION['login_user'] = $myusername;
    echo "false";
    return true;
}

?>