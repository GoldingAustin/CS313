<?php
session_start();
include("database.php");
$message = pg_escape_string($conn, $_POST['mess']);
$roomID = pg_escape_string($conn, $_POST['roomID']);
$user = $_SESSION['login_user'];
$sql = "SELECT * FROM easychat.user WHERE username = '$user'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);
$active = $row['active'];

$count = pg_num_rows($result);

if ($count == 1) {
    $sql = "INSERT INTO easychat.messages (room_id, create_time, message, user_id, username_mess) VALUES ('$roomID', CURRENT_TIMESTAMP, '$message', '$_SESSION[user_id]', '$user')";
    $result = pg_query($conn, $sql);
    echo "$_SESSION[user_id]";
    return true;
} else {
    echo "";
    return true;
}

?>