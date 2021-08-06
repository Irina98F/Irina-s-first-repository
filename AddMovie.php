<?php
include "./AutoLoader.php";
$autoloader = new AutoLoader();
$autoloader->load();

$connect = new DatabaseConnector();

$movieService = new MovieService($connect->connect());
$addcontroller = new addMovieController($movieService);
$add = $addcontroller->addMovie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css"/>
</head>

<body>
    <h2>Add a movie</h2>
    <div class="form">
    <form  method="post">
        <label for="moviename" style="color: antiquewhite">Movie Name: </label>
        <input type="text" name="movie_name">
        <br>
        <label for="lastseen" style="color: antiquewhite">Last Seen:  </label>
        <input type="datetime-local" name="last_seen">
        <br>
        <label for="notes" style="color: antiquewhite">Movie Notes: </label>
        <textarea name="notes" rows="10" cols="30" style="border-radius: 20px"> </textarea>
        <br><br>
<!--        <input type="submit" name="submit" value="Submit">-->
        <button onclick="add" name="submitButton">Submit</button>
        <a href="main.php">Back to home</a>
    </form>

        <div class="drops">
            <div class="drop drop-1"></div>
            <div class="drop drop-2"></div>
            <div class="drop drop-3"></div>
            <div class="drop drop-4"></div>
            <div class="drop drop-5"></div>
        </div>
    </div>

</body>
