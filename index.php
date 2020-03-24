<?php
include 'loginData.php';
session_start();

try {
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}

$statement = $pdo->prepare("SELECT * FROM pskocht_videos ORDER BY datum DESC");
$statement->execute();
$rows = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Title</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Datenbank aller Rankings von PietSmiet" />
    <link rel="stylesheet" href="https://pietsmiet.adrianf.de/styles.css">
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
            <td><?php
                $sec = $row['laenge']%60;
                if ($sec < 10) $sec = "0" . $sec;
                echo floor($row['laenge']/60) . ':' . $sec;?></td>
            <td><?php  echo $row['datum'];?></td>
            <td>
                <a href="<?php echo $row['link'];?>" target="_blank">
                    <img src="images/youtube_icon.png" class="img_link" alt="">
                </a>
            </td>
        </tr>
        <?php
        }
        ?>

    </table>

</body>
</html>