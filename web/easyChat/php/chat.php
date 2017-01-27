<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
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
    <link rel="stylesheet" href="./stylesheets/style.css">
    <!-- jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
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

//    $(window).on('load', function() {
//        chat();
//        function chat() {
//            console.log('yes');
//            var feedback = $.ajax({
//                type: "POST",
//                url: "getMessages.php",
//                async: false
//            }).complete(function () {
//
//                setTimeout(function () {
//                    chat();
//                }, 5000);
//            }).responseText;
//
//            $('#chatBox').append(feedback);
//        }
//    });

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