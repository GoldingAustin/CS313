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
    var json;
    $(window).on('load', function() {
        $.getJSON("colors.json", function(data) {
            var num = Math.floor(Math.random() * 16);
            json = data[num];
        });
    });

    $("#create").validate({
        submitHandler: function (form) {
            $.ajax({
                url: 'checkUser.php',
                type: 'post',
                data: {
                    name: $('#name').val(),
                    pass1: $('#pass1').val(),
                    color: json
                },
                success: function (data) {
                    if (data == "true") {
                        alert("Username exists");
                        return false;
                    }
                    else {
                        console.log(data);
                        location.href = "rooms.php";
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