<?php
session_start();

include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
$pass = pg_escape_string($conn, $pass);
$sql = "SELECT * FROM easychat.user WHERE username = '$myusername'";
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
    $sql = "INSERT INTO easychat.user (username, password, create_time) VALUES ('$myusername', '$pass', CURRENT_TIMESTAMP)";
    $result = pg_query($conn, $sql);
    $_SESSION['login_user'] = $myusername;
    echo "false";
    return true;
}

?>