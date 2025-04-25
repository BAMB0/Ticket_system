<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Eingaben sichern gegen XSS
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);

    //dasselbe spiel wie bei insert.php nur ohne passwort
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $userExists = $stmt->fetchall(); // gibt ein array mit nutzern wieder die mit dem namen übereinstimmen
}
else 
{
    echo "Fehler beim Anmelden.";
}

/*
    if (!$userAlreadyExists)
    {
            // Sicheres Einfügen mit PDO
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

        if ($stmt->execute(['username' => $username, 'password' => $password]))
        {
            echo "Account erfolgreich gespeichert!";
            header("Location: home.html");
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
*/

?>
