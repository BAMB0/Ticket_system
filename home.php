<!DOCTYPE html>

<html lang="de">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deine Fehlermeldungen</title>
</head>
<body>
    <h1>
        <?php
        session_start();
        echo $_SESSION["username"];
        ?>
    </h1>



</body>
</html>