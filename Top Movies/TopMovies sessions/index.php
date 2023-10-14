<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
        $_SESSION["username"] = $_POST["username"];
        header("Location: view.php"); 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Movies - Sessions</title>
</head>   
<body>
    
    <form method="post" action="">
        <label>Username: <input type="text" name="username"></label><br>
        <input type="submit" name="send" value="send">
    </form>
</body>
</html>
