<?php
session_start();
include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$mypassword = pg_escape_string($conn, $_POST['pass1']);

$sql = "SELECT * FROM easychat.user WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = pg_num_rows($result);
$pass = stripslashes($row['password']);
if ($count == 1) {
    if (password_verify($_POST['pass1'], $pass)) {
        if (isset($_SESSION)) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['user_id'] = $row['user_id'];
        }
        echo "false";
        return false;
    } else {
        echo $_POST['pass1'];
        return false;
    }
} else {
    echo "true";
    return false;
}
?>