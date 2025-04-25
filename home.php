<!DOCTYPE html>

<html lang="de">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deine Fehlermeldungen</title>
</head>
<body>
        <?php
        session_start();
        echo $_SESSION["username"];
        ?>
        
    <form action="insert.php" method="post">

        <label>Eintrag:</label>
        <textarea name="text" required></textarea><br>

        <input type="submit" name="Beitrag erstellen" value="Beitrag erstellen">
    </form>


</body>
</html>