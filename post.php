<?php
require 'db.php';
session_start(); 
echo $_SESSION["id"]; // gibt die User_id aus
$user_id = $_SESSION["id"]; //<- hier wird die User_id aus dem Array geholt

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $post_content = htmlspecialchars($_POST['post_content'], ENT_QUOTES, 'UTF-(');
}

?>