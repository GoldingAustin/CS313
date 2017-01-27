<?php
session_start();
include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$mypassword = pg_escape_string($conn, $_POST['pass']);
$sql = "SELECT * FROM `user` WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);


if ($count == 1) {
    if (password_verify($mypassword, $row['password'])) {
        if (isset($_SESSION)) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['user_id'] = $row['user_id'];
        }
        echo "false";
    } else {
        echo "true";
        $error = "Your Password is invalid";
    }
} else {
    echo "true";
}
?>