<?php
include 'loginData.php';
session_start();

try {
    echo $dsn . ' ' . $username . ' ' . $passwd . '<br>';
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h2>Pietsmiet Datenbank</h2>
Test 1231k PHP

</body>
</html>