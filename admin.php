<?php
session_start(); // Startet die Session

// Überprüfen, ob der Benutzer angemeldet ist und ob er Adminrechte hat
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 1) 
{
    // Wenn nicht angemeldet oder kein Admin, Weiterleitung zur Login-Seite
    header("Location: index.html");
    exit(); // Beendet das Skript
}

require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM posts"); // Holt sich alle Posts aus der DB
$stmt->execute(); // Führt das Statement aus

while ($row = $stmt->fetch()) // Holt sich alle Posts aus der DB und gibt sie in einem Array zurück
{
    echo '<div class="post">';
    foreach ($row as $r) {
        echo "<p>$r</p>";
    }
    echo '</div>';
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

        <label>Post ID:</label>
        <br><input type="post_id" name="post_id" placeholder="post_id" required><br>

        <label>Antwort:</label>
        <br><textarea name="reply_content" required></textarea><br>

        <input type="submit" name="Auf Beitrag antworten" value="Auf Beitrag Antworten">
    </form>

    <!-- impressum-->
    <footer class="footer" id="contact">
        <h2 class="heading"><span>Kontakt</span></h2>

        <div class="footer-content">

            <div class="footer-container">
                <div class="footer-box">

                    <p>Dennis Eiben</p>
                    <p>Ihausener Str.72</p>
                    <p>26655 Westerstede</p>
                    <p>Vertreten durch: Dennis Eiben</p>
                </div>

                <div class="footer-box">

                    <p>Telefon: 0176 80460198</p>
                    <p>E-Mail: dennis_eiben@web.de</p>

                    <div class="footer-layer">
                        <a href="mailto: dennis_eiben@web.de" class="btn">E-Mail senden</a>
                    </div>
                </div>

            </div>

        </div>

    </footer>

</body>
</html>