<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eingaben sichern gegen XSS
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);

    //wenn das format der eingeben stimmt wird geprüft ob der nutzer bereits existiert
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username OR email=:email"); //sucht in der db nach den eingegemenen user u. pw
    // ersetzt die platzhalter mit den variablen
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    //führt das statement aus und holt sich einen user mit denselben variablen aus der db
    $stmt->execute();
    $userAlreadyExists = $stmt->fetchColumn();

    if (!$userAlreadyExists)
    {
            // Sicheres Einfügen mit PDO
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

        if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]))
        {
            echo "Account erfolgreich gespeichert!";
            header("Location: home.php");
        }
        else
        {
            echo "Fehler beim erstellen des Accounts.";
        }
    }
    else
    {
        echo "Account existiert bereits.";
    }
}
else
{
    echo "Fehler beim erstellen des Accounts.";
}

?>
