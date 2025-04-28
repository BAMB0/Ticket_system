<?php  
require 'db.php';  

session_start();  
echo $_SESSION["username"];
$username = $_SESSION["username"];  
//$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');  

// holt sich die User_id des eingeloggten Users
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");  
$stmt->bindParam(":username", $username, PDO::PARAM_STR); // <- der letzte teil ist wichtig, damit der username als string interpretiert wird
$stmt->execute();  
$user_id = $stmt->fetch(PDO::FETCH_ASSOC); //<- fetch gibt ein assoziatives Array zurueck, das die User_id enthaelt

// benutzt die user_id wird benutzt um die posts des nutzers zu differenzieren
$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = :user_id");
$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

$stmt->execute();

    while ($row = $stmt->fetch() )
    {
        echo '<div class="post">';
        foreach ($row as $r) {
            print "$r <br>";
        }
        echo '</div>';
    }

?>

<html lang="de">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deine Fehlermeldungen</title>
</head>
<body>
        <h3>neuen Eintrag posten<h3>
    <form action="post.php" method="post">

        <label>Eintrag:</label>
        <br><textarea name="post_content" required></textarea><br>

        <input type="submit" name="neuen Beitrag erstellen" value="neuen Beitrag erstellen">
    </form>

    <!-- impressum-->
    <footer class="footer" id="contact">
        <h2 class="heading"><span>Kontakt</span></h2>

        <div class="footer-content">

            <div class="footer-container">
                <div class="footer-box">

                    <p>Dennis Eiben</p>
                    <p>Ihausener Str.72</p>
                    <p>26655 Westerstede</p>
                    <p>Vertreten durch: Dennis Eiben</p>
                </div>

                <div class="footer-box">

                    <p>Telefon: 0176 80460198</p>
                    <p>E-Mail: dennis_eiben@web.de</p>

                    <div class="footer-layer">
                        <a href="mailto: dennis_eiben@web.de" class="btn">E-Mail senden</a>
                    </div>
                </div>

            </div>

        </div>

    </footer>

</body>
</html>