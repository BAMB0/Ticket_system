<?php
require 'db.php';
session_start();

$stmt = $pdo->prepare("SELECT * FROM posts"); // Holt sich alle Posts aus der DB
$stmt->execute(); // Führt das Statement aus

while ($row = $stmt->fetch() ) // Holt sich alle Posts aus der DB und gibt sie in einem Array zurück
{
    foreach ($row as $r) {
        print "$r <br>";
    }
}


?>