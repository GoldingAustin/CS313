<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        var bars = ["progress-bar-active", "progress-bar-red", "progress-bar-green", "progress-bar-yellow", "progress-bar-purple", "progress-bar-orange", "progress-bar-teal", "progress-bar-pink"];
        var titles = ["Liked Star Wars Movie", "Disliked Star Wars Movie", "Wanted Star Wars Character Movies", "Favorite Star Wars Era", "Do You Hate Sand?"];
        $.getJSON("results.json", function (data) {
            var total = data['results']['total'];
            for (var i = 0; i < 6; i++) {
                createTable(data['results'][i], titles[i], total);
            }
        });

        function createTable(dat, title, total) {
            var i = 0;
            var table = $('<div>').addClass("span6");
            table.append($('<h3>').text(title));
            for (var key in dat) {
                if (dat[key] > 0) {
                    var percent = (dat[key] / total * 100);
                    percent = Math.round(percent * 10) / 10;
                    percent += "%";
                }
                else {
                    var percent = "0%";
                }
                table.append($('<strong>').text(key));
                table.append($('<span>').addClass("pull-right").text(percent));
                table.append($('<div>').addClass("progress " + bars[i] + " active").append($('<div>').addClass("progress-bar").css("width", percent)));
                i++;
            }
            $('.container').append(table);
        }
    </script>
</head>
<body>
<div class="container">
</div>
</body>
</html>