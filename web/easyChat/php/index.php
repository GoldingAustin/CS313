<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

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
            <li class="changeColor"><a href="/">Rooms</a></li>
            <li class="changeColor pull-right"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="wrapper">
        <form id="room" action="" method="post">
            <div class="form-group">
                <label for="name">Create a Room:</label>
                <input id="name" name="name" type="text" class="form-control"/>
            </div>
            <button id="sub" type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Room</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("database.php");
            $sql = 'SELECT * FROM easychat.rooms';
            $result = pg_query($conn, $sql);

            //        $count = mysqli_num_rows($result);
            while ($row = pg_fetch_array($result, PGSQL_ASSOC)) {
                echo '<tr>';
                echo '<td> <a href="chat.php?roomName=' . $row['room_name'] . '&roomID=' . $row['room_id'] .'">' . $row['room_name'] . '</a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<script>
    $("#room").validate({
        submitHandler: function (form) {
            $.ajax({
                url: 'checkRoom.php',
                type: 'post',
                data: {name: $('#name').val(),},
                success: function (data) {
                    if (data == "") {
                        alert("Room exists");
                        return false;
                    }
                    else {
                        location.href=data;
                    }

                }
            });
        },
        rules: {
            pass: "required"
        }
    });
</script>
</html>