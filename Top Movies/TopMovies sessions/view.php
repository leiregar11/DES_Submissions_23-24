<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Movies - Leire</title>
</head>
<body >
<?php include "movies.php"; ?>

<div class="showInfo">

    <?php
    if (isset($_GET['reset'])) {
        session_start(); 
    } 

    try {
        $topMovies = new TopMovies("");
        
        if (isset($_SESSION["movies"])) {
            $topMovies = new TopMovies($_SESSION["movies"]);
        }
        
            if (isset($_POST["name"]) || isset($_POST["isan"])) {
    
                if (empty($_POST["isan"])) {
                    $topMovies->printByName($_POST["name"]);
                } else {
                    $newMovie = new Movie($_POST["name"], $_POST["isan"], $_POST["year"], $_POST["punctuation"]);
                    $topMovies->manager($newMovie);
                    $topMovies->printMovies();
                }
    
                $_SESSION["movies"] = $topMovies->getFilms();
            } else{
                echo "Missing data, make sure that at least the name or the ISAN are entered.";
            }
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

</div>
    <div class="enterInfo">
    <form method="POST" action="view.php">
        <label>Name: <input type="text" name="name"></label><br>
        <label>ISAN: <input type="text" name="isan"></label><br>
        <label>Year: <input type="text" name="year"></label><br>
        <label>Punctuation: 
            <select name="punctuation">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </label><br>
        <input type="submit" name="send" value="send">
        
    </form>
</div>

</body>
</html>