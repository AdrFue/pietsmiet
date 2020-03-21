<?php
include 'loginData.php';
session_start();

try {
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}

$statement = $pdo->prepare("SELECT * FROM pskocht_videos");
$statement->execute();
$rows = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h2>Pietsmiet Datenbank</h2>
    <?php
    foreach ($rows as $row) {
    ?>
    <table>
        <tr>
            <th>Titel</th>
            <th>Länge</th>
            <th>Datum</th>
            <th>Link</th>
        </tr>
        <tr><?php  echo $row['titel'];?> </tr>
        <tr><?php  echo $row['laenge'];?> </tr>
    </table>
    <?php
    }
    ?>
</body>
</html>