<?php
require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM posts"); // Holt sich alle Posts aus der DB
$stmt->execute(); // Führt das Statement aus

while ($row = $stmt->fetch() ) // Holt sich alle Posts aus der DB und gibt sie in einem Array zurück
{
    foreach ($row as $r) {
        print "$r <br>";
    }
}

?>

<html lang="de">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Fehlermeldungen</title>
</head>
<body>
        <h3>Auf Beitrag Antworten<h3>
    <form action="reply.php" method="post">

        <input type="post_id" name="post_id" placeholder="post_id" required><br>

        <label>Antwort:</label>
        <textarea name="post_content" required></textarea><br>

        <input type="submit" name="Auf Beitrag antworten" value="Auf Beitrag Antworten">
    </form>


</body>
</html>