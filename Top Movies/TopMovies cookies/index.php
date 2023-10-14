<?php
if (!empty($_POST["username"])) {
    $username = $_POST["username"];
    setcookie("username", $username, time() + 3600, "/"); // Crea una cookie llamada "username" que expira en 1 hora
    header("Location: view.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Movies - Hidden</title>
</head>   
<body>
    
    <form method="post" action="">
        <label>Username: <input type="text" name="username"></label><br>
        <input type="submit" name="send" value="send">
    </form>
</body>
</html>
