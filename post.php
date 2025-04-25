<?php 
require 'db.php';

        session_start();
        echo $_SESSION["username"];
        $username = $_SESSION["username"];
        $text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');

        //$stmt = $pdo->prepare("SELECT * FROM posts WHERE username=:username");
        //$stmt->bindParam(":id", $user_id);
?>