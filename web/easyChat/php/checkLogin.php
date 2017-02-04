<?php
session_start();
include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$mypassword = pg_escape_string($conn, $_POST['pass1']);
$mypassword = stripslashes($mypassword);
$sql = "SELECT * FROM easychat.user WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);

$count = pg_num_rows($result);
if ($count >= 1) {
    if (password_verify($mypassword, $row["password"])) {
        if (isset($_SESSION)) {
            $_SESSION['user_color'] = $row['user_color'];
            $_SESSION['login_user'] = $myusername;
            $_SESSION['user_id'] = $row["user_id"];
        }
        echo "true";
        return false;
    } else {
        echo "Incorrect Password";
        return false;
    }
} else {
    echo "Incorrect Username/Password";
    return false;
}
?>