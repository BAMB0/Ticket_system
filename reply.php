<?php
require 'db.php';
session_start();
$user_id = $_SESSION["id"]; //<- hier wird die User_id aus dem Array geholt

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $post_id = htmlspecialchars($_POST['post_id'], ENT_QUOTES, 'UTF-8'); // Eingaben sichern gegen XSS
    $reply_content = htmlspecialchars($_POST['reply_content'], ENT_QUOTES, 'UTF-8'); // Eingaben sichern gegen XSS
    
    // Sicheres Einfügen mit PDO
    $stmt = $pdo->prepare("INSERT INTO posts (post_id, reply_content) VALUES (:post_id, :reply_content)");

    if ($stmt->execute(['post_id' => $post_id, 'reply_content' => $reply_content]))
    {
        echo "Beitrag erfolgreich gespeichert!";
        header("Location: home.php");
    }
    else
    {
        echo "Fehler beim erstellen des Beitrags #2.";
    }
}
else
{
    echo "Fehler beim erstellen des Beitrags #1.";
}

?>