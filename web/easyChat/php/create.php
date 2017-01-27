<?php
session_start();
//include("database.php");

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
            <li class="changeColor"><a href="/">Create Room</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="wrapper">
        <form id="create" action="" method="post">
            <div class="form-group">
                <p>
                    <label for="name">Username:</label>
                    <input id="name" name="name" type="text" class="form-control" required/>
                </p>
                <p>
                    <label for="pass1">Password:</label>
                    <input id="pass1" name="pass1" type="password" class="form-control" required/>
                </p>
                <p>
                    <label for="pass2">Verify Password:</label>
                    <input id="pass2" name="pass2" type="password" class="form-control" required/>
                </p>
            </div>
            <button id="sub" type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
</body>
<script>
    $("#create").validate({
        submitHandler: function (form) {
            $.ajax({
                url: 'checkUser.php',
                type: 'post',
                data: {
                    name: $('#name').val(),
                    pass1: $('#pass1').val()
                },
                success: function (data) {
                    if (data == "true") {
                        alert("Username exists");
                        return false;
                    }
                    else {
                        location.href = "index.php";
                    }

                }
            });
        },
        rules: {
            pass1: "required",
            pass2: {
                equalTo: "#pass1"
            }
        }
    });

</script>
</html>