<?php
session_start();
    if (isset($_SESSION['entered'])) {
    header("Location: results.php");
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form action="setValues.php" method="post" id="swForm">
        <div class="form-group">
            <h2 class="control-label">Which of these Star Wars Movies do you like the most?</h2>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode I – The Phantom Menace">Episode I –
                    The Phantom Menace</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode II – Attack of the Clones">Episode II –
                    Attack of the Clones</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode III – Revenge of the Sith">Episode III –
                    Revenge of the Sith</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode IV – A New Hope">Episode IV – A New
                    Hope</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode V – The Empire Strikes Back">Episode V – The
                    Empire Strikes Back</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode VI – Return of the Jedi">Episode VI – Return
                    of the Jedi</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Episode VII – The Force Awakens">Episode VII – The
                    Force Awakens</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="likeMovie" value="Rogue One: A Star Wars Story">Rogue One: A Star Wars
                    Story</label>
            </div>
        </div>
        <div class="form-group">
            <h2 class="control-label">Which of these Star Wars Movies do you dislike the most?</h2>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode I – The Phantom Menace">Episode I – The
                    Phantom Menace</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode II – Attack of the Clones">Episode II –
                    Attack of the Clones</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode III – Revenge of the Sith">Episode III –
                    Revenge of the Sith</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode IV – A New Hope">Episode IV – A New
                    Hope</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode V – The Empire Strikes Back">Episode V –
                    The Empire Strikes Back</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode VI – Return of the Jedi">Episode VI –
                    Return of the Jedi</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Episode VII – The Force Awakens">Episode VII – The
                    Force Awakens</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="dislikeMovie" value="Rogue One: A Star Wars Story">Rogue One: A Star
                    Wars Story</label>
            </div>
        </div>
        <div class="form-group">
            <h2 class="control-label">Which Star Wars character would you like Disney to make a movie about?</h2>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Boba Fett">Boba Fett</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Han Solo">Han
                    Solo</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Darth Vader">Darth
                    Vader</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Obi-Wan Kenobi">Obi-Wan Kenobi</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Yoda">Yoda</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="character" value="Lando Calrissian">Lando Calrissian</label>
            </div>
        </div>
        <div class="form-group">
            <h2 class="control-label">Which era of Star Wars do you like?</h2>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="era" value="The Prequel Trilogy Era">The Prequel Trilogy Era</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="era" value="Original Trilogy Era">Original Trilogy Era</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="era" value="Sequal Trilogy Era">Sequal Trilogy Era</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio"   name="era" value="The Old Republic Era">The Old Republic Era</label>
            </div>
        </div>
        <div class="form-group">
            <h2 class="control-label">Bonus Question: Do you hate sand?</h2>
            <div class="radio">
                <label class="radio control-label"><input type="radio" name="sand" value="Yes">Yes</label>
            </div>
            <div class="radio">
                <label class="radio control-label"><input type="radio" name="sand" value="No">No</label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default pull-right" onclick="location.href='results.php';">See Results</button>
    </form>

</div>
</body>
<script>
    var form = document.querySelector("form");
    form = form.getElementsByClassName("form-group");

    $(function() {

        $("#swForm").on('submit', function (e) {
            var valid = true;
            if($('input[name=likeMovie]:checked').length<=0)
            {
                valid = false;
                form[0].setAttribute("class", "form-group has-error");
            }
            if($('input[name=dislikeMovie]:checked').length<=0)
            {
                valid = false;
                form[1].setAttribute("class", "form-group has-error");
            }
            if($('input[name=character]:checked').length<=0)
            {
                valid = false;
                form[2].setAttribute("class", "form-group has-error");
            }
            if($('input[name=era]:checked').length<=0)
            {
                valid = false;
                form[3].setAttribute("class", "form-group has-error");
            }
            if($('input[name=sand]:checked').length<=0)
            {
                valid = false;
                form[4].setAttribute("class", "form-group has-error");
            }
            if(valid == false)
            {
                alert("Please make a selection for highlighted questions");
                e.preventDefault();
                return false;
            }
        });
    });

</script>
</html>