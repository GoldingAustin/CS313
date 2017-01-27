<?php
include("database.php");
$roomName = pg_escape_string($conn, $_POST['name']);
$roomID = $_GET['roomID'];
$sql = "SELECT * FROM easychat.messages WHERE room_id = '$roomID'";
$result = pg_query($conn, $sql);
while ($row = pg_fetch_array($result, PGSQL_ASSOC)) {
    echo '<div class="chat-msg">
    <p id = "message-Content" >' . $row['message'] . '</p >
    <div class="chat-msg-author" >
    <strong id="messageSender">' . $row['username'] . '</strong >
    <span class="date" >' . $row['create_time'] . '</span >
    </div >
    </div >';
}
?>