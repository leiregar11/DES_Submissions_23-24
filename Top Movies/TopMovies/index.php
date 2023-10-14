<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Movies - Hidden</title>
</head>
<body>

    <form method="post" action="view.php">
        <input type="hidden" name="username" value="<?php echo isset($_POST["username"]);?>">
        <label>Username: <input type="text" name="username"></label><br>
        <input type="submit" name="send" value="send">
    </form>
</body>
</html>