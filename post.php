<?php  
require 'db.php';  

session_start();  
echo $_SESSION["username"];  
$username = $_SESSION["username"];  
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');  

// holt sich die User_id des eingeloggten Users
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");  
$stmt->bindParam(":username", $username, PDO::PARAM_STR); // <- der letzte teil ist wichtig, damit der username als string interpretiert wird
$stmt->execute();  
$user_id = $stmt->fetch(PDO::FETCH_ASSOC); //<- fetch gibt ein assoziatives Array zur�ck, das die User_id enth�lt

// benutzt die user_id wird benutzt um die posts des nutzers zu differenzieren
$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = :user_id");
$stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
$stmt->bindParam(":post_content", $post_content, PDO::PARAM_STR);
$stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($post); // gibt den Inhalt des Posts aus