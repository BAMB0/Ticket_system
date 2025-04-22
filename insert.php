<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eingaben sichern gegen XSS
    $nickname = htmlspecialchars($_POST['nickname'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $entry = htmlspecialchars($_POST['entry'], ENT_QUOTES, 'UTF-8');

    // Sicheres Einfügen mit PDO
    $stmt = $pdo->prepare("INSERT INTO entries (nickname, email, entry) VALUES (:nickname, :email, :entry)");
    if ($stmt->execute(['nickname' => $nickname, 'email' => $email, 'entry' => $entry])) {
        echo "Eintrag erfolgreich gespeichert!";
    } else {
        echo "Fehler beim Speichern des Eintrags.";
    }
}
?>
