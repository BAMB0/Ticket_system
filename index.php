<!DOCTYPE html>

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
        <input type="password" name="password" placeholder="password" required><br>

        <input type="submit" name="create_Account" value="create_Account">
    </form>
    <!-- ka, hab ich aus der aufgabe geklaut, am besten durch <div> ersetzen -->

</body>
</html>

<!--eine gaestelist etabelle muss noch erstellt werden, fine raus wie das mit dem pw funktioniert-->