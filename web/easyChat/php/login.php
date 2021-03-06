<?php
session_start();
include("database.php");
if (isset($_SESSION['login_user'])) {
    header("location: rooms.php");
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
<nav class="navbar navbar-light bg-primary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand text-color">Easy Chat</a>
        <ul class="nav navbar-nav">
            <li class="nav-item text-color"><a class="text-color" href="/">Home</a></li>
            <li class="nav-item text-color"><a class="text-color" href="rooms.php">Rooms</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="wrapper">
        <form id="login" action="" method="post">
            <div class="form-group">
                <p>
                    <label for="name">Username:</label>
                    <input id="name" name="name" type="text" class="form-control" required/>
                </p>
                <p>
                    <label for="pass1">Password:</label>
                    <input id="pass1" name="pass1" type="password" class="form-control" required/>
                </p>
            </div>
            <button id="sub" type="submit" class="btn btn-default">Submit</button>
            <button class="pull-right btn btn-default" type="button" onclick="location.href='create.php';">Create Account</button>
        </form>
    </div>
</div>
</body>
<script>



    $("#login").validate({
        submitHandler: function (form) {
            $.ajax({
                url: 'checkLogin.php',
                type: 'post',
                data: {
                    name: $('#name').val(),
                    pass1: $('#pass1').val()
                },
                success: function (data) {
                    if (data == "true") {
                        location.href = "rooms.php";

                    }
                    else {
                        alert(data);
                        return false;
                    }

                }
            });
        },
        rules: {
            pass1: "required"
        }
    });
</script>
</html>