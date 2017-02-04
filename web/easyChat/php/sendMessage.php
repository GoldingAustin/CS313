<?php
session_start();
include("database.php");
$message = pg_escape_string($conn, $_POST['mess']);
$roomID = pg_escape_string($conn, $_POST['roomID']);
$user = $_SESSION['login_user'];
$sql = "SELECT * FROM easychat.user WHERE username = '$user'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);

$count = pg_num_rows($result);

if ($count == 1) {
    $userID = $_SESSION['user_id'];
    $sql = "INSERT INTO easychat.messages (room_id, create_time, message, user_id, username_mess, user_color) VALUES ('$roomID', CURRENT_TIMESTAMP, '$message', '$_SESSION[user_id]', '$user', '$_SESSION[user_color]')";
    $result = pg_query($conn, $sql);
    $sql = "SELECT count(*) AS exact_num FROM easychat.messages WHERE room_id='$roomID'";
    $count = pg_query($conn, $sql);
    $count = pg_fetch_result($count, 0);
    $sql = "UPDATE easychat.rooms SET num_messages = '$count' WHERE room_id = '$roomID'";
    $result = pg_query($conn, $sql);
    echo "$count";
    return true;
} else {
    echo "";
    return true;
}

?>