<?php  
require 'db.php';  

session_start();  
echo $_SESSION["username"];  
$username = $_SESSION["username"];  
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');  

// Extract the id from the user table  
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");  
$stmt->bindParam(":username", $username, PDO::PARAM_STR);  
$stmt->execute();  
$user = $stmt->fetch(PDO::FETCH_ASSOC);  

if ($user) {  
   $user_id = $user['id'];  
   echo "User ID: " . $user_id;  
} else {  
   echo "User not found.";  
}