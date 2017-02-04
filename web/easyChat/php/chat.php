<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
//include('database.php');
//$roomID = $_GET['roomID'];
//$sql = "SELECT * FROM easychat.messages WHERE room_id = '$roomID'";
//$result = pg_query($conn, $sql);
//$row = pg_fetch_assoc($result);
$_SESSION['num_messages'] = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Easy Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Latest compiled and minified CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <!-- jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
    <!-- Latest compiled JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header"><a href="" class="navbar-brand">Easy Chat</a></div>
        <ul class="nav navbar-nav">
            <li class="changeColor"><a href="/">Home</a></li>
            <li class="changeColor"><a href="rooms.php">Rooms</a></li>
            <li class="changeColor"><a href="logout.php">Logout</a></li>
            <p class="navbar-text navbar-right">Signed in as <?php echo $_SESSION['login_user'] ?></p>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <div class="col-md-8 col-xs-8">
                <h3 class="panel-title"><span class=""></span><?php echo $_GET['roomName']; ?></h3>
            </div>
        </div>
        <form id="chat">
            <div class="panel-body" ng-style="vm.panelStyle">
                <div class="row">
                    <div id="chatBox" class="col-md-12 col-xs-12">
                        <?php
                        include ('database.php');
                        $sql = "SELECT * FROM easychat.messages WHERE room_id = '$_GET[roomID]'";
                        $result = pg_query($conn, $sql);
                        while ($row = pg_fetch_assoc($result)) {
                            echo '<div class="chat-msg">
                            <div class="chat-msg-author" >
                                <strong id="messageSender" style="color: ' . $row['user_color'] . '">' . $row['username_mess'] . '</strong >
                                <span class="date pull-right" >' . $row['create_time'] . '</span >
                            </div >
                            <p id = "message-Content" >' . $row['message'] . '</p >
                        </div >';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">

                <div class="input-group">
                    <input type="text" id="inputMessage" class="form-control input-sm"/>
                    <span class="input-group-btn"><input type="submit" class="btn btn-sm"/></span>
                </div>
        </form>
    </div>
</div>
</div>
</body>
<script>

    $(window).on("load", function () {
        chat();
        //setTimeout(chat, 3000);
    });
    $("#chat").validate({
        submitHandler: function (form) {
            $.ajax({
                url: 'sendMessage.php',
                type: 'post',
                data: {mess: $('#inputMessage').val(), roomID: $.urlParam('roomID')},
                success: function (data) {
                    if (data == "") {
                        return false;
                    }
                    else {
                        console.log(data);
                        return false;
                    }
                }
            });
        }
    });
    function chat() {
        $.ajax({
            type: "POST",
            url: "getMessages.php",
            data: {roomID: $.urlParam('roomID')},
            success: function (data) {
                if (data == "no") {
                    console.log(data);
                } else {
                    $('#chatBox').append(data);
                }
            }
        });
        setTimeout(chat, 6000);
    }

    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
        if (results == null) {
            return null;
        }
        else {
            return results[1] || 0;
        }
    }
</script>
</html>