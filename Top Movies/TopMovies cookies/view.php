<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Movies - Leire</title>
</head>
<body>
<?php include "movies.php"; ?>

<div class="showInfo">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>ISAN</th>
            <th>Year</th>
            <th>Punctuation</th>
        </tr>
        <?php

        try{
            $topMovies = new TopMovies("");
            if (isset($_POST["hidden"])){
                $topMovies = new TopMovies($_POST["hidden"]);
                if (isset($_POST["name"]) && isset($_POST["isan"])) {
                    // Crear una nueva película con los datos del formulario y controlarla
                    $newMovie = new Movie($_POST["name"], $_POST["isan"], $_POST["year"], $_POST["punctuation"]);
                    $topMovies->manager($newMovie);
                } else {
                    echo "Missing data, make sure that at least the name or the ISAN are entered.";
                }
            }
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        


        if(isset($topMovies)&& $topMovies!="") {
            $cont = 0;
            foreach ($topMovies as $movies) {
                    $cont++;
                    if ($cont % 2 == 0) {
                        echo "<tr style='background-color: lightblue;'>";
                    } else {
                        echo "<tr>";
                    }
                    echo $movies->printFilms();
                    echo "</tr>";
                
            }
        }
        ?>
    </table>
</div>
    <div class="enterInfo">
    <form method="get" action="view.php">
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
        <input type="hidden" name="hidden" value="<?php echo $topMovies->getFilms(); ?>">
        
        
    </form>
</div>

</body>
</html>