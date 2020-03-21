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

    <table>
        <tr>
            <th>Titel</th>
            <th>Länge</th>
            <th>Datum</th>
            <th>Link</th>
        </tr>

        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?php  echo $row['titel'];?></td>
                <td><?php  echo floor($row['laenge']/60) . ':' . $row['laenge']%60;?></td>
                <td><?php  echo $row['datum'];?></td>
                <td>
                    <a href="<?php echo $row['link'];?>">
                        <img src="images/youtube_icon.png">
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>
</html>