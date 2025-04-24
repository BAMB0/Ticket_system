<?php
require 'db.php';
/*
$dsn = "mysql:dbname=ticketsystem;host=localhost";
$username = "root";
$password = "";
// PDO = php data objects - schnittstelle für die sql datenbank - dsn = data source dame = selbsterklaerend, suammengesestzt aus datenbank und host
$con = new PDO($dsn, $username, $password);
*/



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eingaben sichern gegen XSS
    $nickname = htmlspecialchars($_POST['nickname'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    // Sicheres Einfügen mit PDO
    $stmt = $pdo->prepare("INSERT INTO entries (nickname, email, password) VALUES (:nickname, :email, :password)");
    if ($stmt->execute(['nickname' => $nickname, 'email' => $email, 'password' => $password])) {
        echo "Account erfolgreich gespeichert!";
    } else {
        echo "Fehler beim erstellen des Accounts.";
    }
}

?>
