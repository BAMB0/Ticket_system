<?php
require 'db.php';
session_start(); 
echo $_SESSION["id"]; // gibt die User_id aus
$user_id = $_SESSION["id"]; //<- hier wird die User_id aus dem Array geholt

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $post_content = htmlspecialchars($_POST['post_content'], ENT_QUOTES, 'UTF-8'); // Eingaben sichern gegen XSS
    
    // Sicheres Einfügen mit PDO
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, post_content) VALUES (:user_id, :post_content)");

    if ($stmt->execute(['user_id' => $user_id, 'post_content' => $post_content]))
    {
        echo "Beitrag erfolgreich gespeichert!";
        header("Location: home.php");
    }
    else
    {
        echo "Fehler beim erstellen des Beitrags.";
    }
}
else
{
    echo "Fehler beim erstellen des Beitrags.";
}

?>