<?php
session_start();

include("database.php");
$myusername = pg_escape_string($conn, $_POST['name']);
$color = $_POST['color'];
$pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
$pass = pg_escape_string($conn, $pass);
$sql = "SELECT * FROM easychat.user WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);

$count = pg_num_rows($result);

if ($count >= 1) {
    $error = "Username already exists";
    echo "$color";
    return true;
} else {
    $sql = "INSERT INTO easychat.user (username, password, create_time, user_color) VALUES ('$myusername', '$pass', CURRENT_TIMESTAMP, '$color')";
    $result = pg_query($conn, $sql);
    $row1 = pg_fetch_assoc($result);
    $_SESSION['login_user'] = $myusername;
    $_SESSION['user_color'] = $color;
    $_SESSION['user_id'] = $row["user_id"];
    echo "$color";
    return true;
}

?>