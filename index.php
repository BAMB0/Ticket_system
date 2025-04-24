<!DOCTYPE html>

<?php 
    require("insert.php");

    // fragt ab ob es übertragen wurde
    if (isset($_Post["submit"])) {
	
    var_dump($_Post);

    }
    

?>

<html lang="de">
<head>
    <link rel="stylesheet" href="style.css" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintrag hinzufuegen</title>
</head>
<body>

    <!-- ka, hab ich aus der aufgabe geklaut, am besten durch <div> ersetzen -->
    <form action="insert.php" method="post">
        <label>Nickname:</label>
        <input type="text" name="nickname" placeholder="nickname" required><br>

        <label>E-Mail:</label>
        <input type="email" name="email" placeholder="email" required><br>

        <label>Passwort:</label>
        <input type="password" name="password" placeholder="password" required></textarea><br>

        <input type="submit" name="eintrag_senden" value="Eintrag senden">
    </form>
    <!-- ka, hab ich aus der aufgabe geklaut, am besten durch <div> ersetzen -->

</body>
</html>

<!--eine gaestelist etabelle muss noch erstellt werden, fine raus wie das mit dem pw funktioniert-->