<?php  
require 'db.php';  

session_start();  
echo $_SESSION["username"];  
$username = $_SESSION["username"];  
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');  

// Extract the id from the user table  
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");  
$stmt->bindParam(":username", $username, PDO::PARAM_STR); // <- der letzte teil ist wichtig, damit der username als string interpretiert wird
$stmt->execute();  
$user_id = $stmt->fetch(PDO::FETCH_ASSOC); //<- fetch gibt ein assoziatives Array zurück, das die User_id enthält

$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
$stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
$stmt->bindParam(":post_content", $post_content, PDO::PARAM_STR);
$stmt->bindParam(":post_date", $post_date, PDO::PARAM_DATE);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);