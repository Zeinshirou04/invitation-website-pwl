<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        // Checking Cookies
        if(!isset($_COOKIE["username"])) {
            echo "Users " . $_COOKIE["username"] . " isn't logged in!";
        } else {
            echo "Users " . $_COOKIE["username"] . " logged in!";
        }
    ?>
</body>
</html>