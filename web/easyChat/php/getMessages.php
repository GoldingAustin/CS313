<?php
include("database.php");
$roomID = $_POST['roomID'];

$sql1 = "SELECT * FROM easychat.rooms WHERE room_id = '$roomID'";
$roomNum = pg_query($conn, $sql1);
$row1 = pg_fetch_assoc($roomNum);
$numMessages = $row1['num_messages'];

$sql = "SELECT * FROM easychat.messages WHERE room_id = '$roomID'";
$result = pg_query($conn, $sql);


if ($_SESSION['num_messages'] < $numMessages) {

    $i = 0;
    while ($row = pg_fetch_assoc($result)) {
        if ($row['message'] != "" && $i > $_SESSION['num_messages']) {
            echo '<div class="chat-msg">
    <div class="chat-msg-author" >
    <strong id="messageSender" style="color: ' . $row['user_color'] . '">' . $row['username_mess'] . '</strong >
    <span class="date pull-right" >' . $row['create_time'] . '</span >
    </div >
    <p id = "message-Content" >' . $row['message'] . '</p >
    </div >';
        }
        $i++;
    }
    $_SESSION['num_messages'] = $numMessages;
} else {

}


?>