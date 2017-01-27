<?php
session_start();
include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$mypassword = pg_escape_string($conn, $_POST['pass']);
$username = trim($myusername);
$sql = "SELECT * FROM easychat.user WHERE username = '" . $username . "';";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = pg_num_rows($result);
$pass = pg_escape_string($conn, $row['password']);
if ($count == 1) {
    if (password_verify($_POST['pass'], $pass)) {
        if (isset($_SESSION)) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['user_id'] = $row['user_id'];
        }
        echo "false";
    } else {
        echo $pass;
    }
} else {
    echo "Username or Password Incorrect";
}
?>