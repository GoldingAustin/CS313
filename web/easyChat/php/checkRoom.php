<?php
session_start();
include("database.php");
$roomName = pg_escape_string($conn, $_POST['name']);
$sql = "SELECT * FROM easychat.rooms WHERE room_name = '$roomName'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);

$count = pg_num_rows($result);


if ($count != 1) {
    $sql = "INSERT INTO easychat.rooms (room_name, creator_id, create_time) VALUES ('$roomName', '$_SESSION[user_id]', CURRENT_TIMESTAMP)";
    $result = pg_query($conn, $sql);
    $_SESSION['room'] = $roomName;
    $sql = "SELECT * FROM easychat.rooms WHERE room_name = '$roomName'";
    $result = pg_query($conn, $sql);
    $row = pg_fetch_assoc($result);
    $roomId = $row['room_id'];
    $_SESSION['roomID'] = $row['room_id'];
    echo "chat.php?roomName=$roomName&roomID=$roomId";
} else {
    echo "";
}
?>