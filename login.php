<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Eingaben sichern gegen XSS
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    //dasselbe spiel wie bei insert.php nur ohne passwort
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $userExists = $stmt->fetchall(); // gibt ein array mit nutzern wieder die mit dem namen uebereinstimmen

    $passwordHashed = $userExists[0]["password"]; //passwordHashed holt sich das Passwort vom UserExists Array
    $checkPassword = password_verify($password, $passwordHashed); 
    //password_verify vergleicht das eingegebene und das encryptete passwort und gibt einen bool zurueck 

    if ($checkPassword === true) 
    {
        // Passwort ist korrekt
        echo "Anmeldung erfolgreich!";
        session_start();
        $_SESSION['username'] = $username; //session wird gestartet und der username in die session geschrieben
        $_SESSION['id'] = $userExists[0]['id']; // id wird in die session geschrieben
        $_SESSION['is_admin'] = $userExists[0]['is_admin']; // admin status wird in die session geschrieben
        
        If ($userExists[0]['is_admin'] == 1) 
        {
            header("Location: admin.php"); // wenn der nutzer admin ist wird er auf die admin seite weitergeleitet
        } else 
        {
            header("Location: home.php"); // wenn der nutzer kein admin ist wird er auf die home seite weitergeleitet
        }
        
    } 
    else 
    {
        // Passwort ist falsch
        echo "Falsches Passwort.";
    }

}
else 
{
    echo "Fehler beim Anmelden.";
}

?>
