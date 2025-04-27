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
$user_id = $stmt->fetch(PDO::FETCH_ASSOC); //<- fetch gibt ein assoziatives Array zur�ck, das die User_id enth�lt
var_dump( $user_id); // gibt die User_id aus

$u_id = $user_id['id']; // <- hier wird die User_id aus dem Array geholt
var_dump($u_id); // gibt die User_id aus)

// benutzt die user_id wird benutzt um die posts des nutzers zu differenzieren
$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = :user_id");
 $stmt->bindParam(":user_id", $u_id, PDO::PARAM_INT);
/*  $stmt->bindParam(":post_id", $id, PDO::PARAM_INT);
$stmt->bindParam(":post_content", $post_content, PDO::PARAM_STR);
$stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
*/
$stmt->execute();

    while ($row = $stmt->fetch() ){
        foreach ($row as $r) {
            print "$r <br>";
        }
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
    <form action="home.php" method="post">

        <label>Eintrag:</label>
        <textarea name="text" required></textarea><br>

        <input type="submit" name="neuen Beitrag erstellen" value="neuen Beitrag erstellen">
    </form>


</body>
</html>