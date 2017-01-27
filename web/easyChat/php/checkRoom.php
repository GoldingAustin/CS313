<?php
session_start();
include("database.php");
$roomName = pg_escape_string($conn, $_POST['name']);
$sql = "SELECT * FROM `rooms` WHERE room_name = '$roomName'";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);
$uid = pg_escape_string($conn, $_SESSION['user_id']);

if ($count != 1) {
    $sql = "INSERT INTO `rooms` (`room_id`, `room_name`, `creator_id`, `create_time`) VALUES (NULL, '$roomName', '$uid', CURRENT_TIMESTAMP)";
    $result = pg_query($conn, $sql);
    $_SESSION['room'] = $roomName;
    $sql = "SELECT * FROM `rooms` WHERE room_name = '$roomName'";
    $result = pg_query($conn, $sql);
    $row = pg_fetch_array($result, PGSQL_ASSOC);
    $roomId = $row['room_id'];
    $_SESSION['roomID'] = $row['room_id'];
    echo "chat.php?roomName=$roomName&roomID=$roomId";
} else {
    echo "";
}
?>