<?php
session_start();

if (isset($_SESSION['login_user'])) {
    header("location: index.php");
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
    <!-- jQu012ery library-->
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
        <form id="login" action="" method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input id="name" name="name" type="text" class="form-control"/>

                <label for="password">Password:</label><input id="password" name="pass" type="password"
                                                              class="form-control"/>
            </div>
            <button id="sub" type="submit" class="btn btn-default">Submit</button>
            <button class="pull-right btn btn-default" type="button"><a href="create.php">Create Account</a></button>
        </form>
    </div>
</div>
</body>
<script>
    $("#login").validate({
        submitHandler: function (form) {
            form.preventDefault();
            $.ajax({
                url: 'checkLogin.php',
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    pass: $('#password').val()
                },
                success: function (data) {
                    if (data == "false") {
                        alert("sure");
                        location.href = "index.php";
                    }
                    else {
                        alert(data);
                        return false;
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