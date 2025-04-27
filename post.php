<?php
require 'db.php';
session_start();
echo $_SESSION["id"];  
$user_id = $_SESSION["id"];
var_dump($user_id); // gibt die User_id aus)

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $post_content = htmlspecialchars($_POST['post_content'], ENT_QUOTES, 'UTF-(');
}

?>