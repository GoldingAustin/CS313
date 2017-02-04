<?php
include("database.php");
pg_query($conn, 'LISTEN newMessage;');
$results = pg_get_notify($conn);

if (!$results) {
    echo "no";
} else {
    $roomName = pg_escape_string($conn, $_POST['name']);
    $roomID = $_GET['roomID'];
    $sql = "SELECT * FROM easychat.messages WHERE room_id = '$roomID'";
    $result = pg_query($conn, $sql);
    $num = pg_num_rows($result) - 1;
    $sql = "SELECT * FROM easychat.messages WHERE room_id = '$roomID' OFFSET '$num'";
    $result = pg_query($conn, $sql);
    $row = pg_fetch_assoc($result);
    echo '<div class="chat-msg">
    <p id = "message-Content" >' . $row['message'] . '</p >
    <div class="chat-msg-author" >
    <strong id="messageSender">' . $row['username'] . '</strong >
    <span class="date" >' . $row['create_time'] . '</span >
    </div >
    </div >';

}


?>