<?php
include 'utils/ConnectionManager.php';
include 'utils/DataBaseConstants.php';

$stmt = null;

try {
    $connectionManager = new ConnectionManager(
        DatabaseConstants::$MYSQL_CONNECTION_STRING,
        DatabaseConstants::$MYSQL_USERNAME,
        DatabaseConstants::$MYSQL_PASSWORD
    );
    $conn = $connectionManager->getConnection();
    $stmt = $conn->prepare("SELECT * from game");
    $boo = $stmt->execute();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $gameCount = count($games);
} catch (PDOException $ex) {
    header("Location: error.php?err='" . $ex->getMessage() . "'");
} finally {
    if (!is_null($stmt)) {
        $stmt->closeCursor();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Game Entries</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Length in hours</th>
            <th>Release Year</th>
            <th>Actions</th>
        </tr>
        <?php
        $output = "";
        for ($i = 0; $i < $gameCount; $i++) {
            $game = $games[$i];
            $output .= '<tr>';
            $output .= '<td>' . $game['gameID'] . '</td>';
            $output .= '<td>' . $game['gameName'] . '</td>';
            $output .= '<td>' . $game['gameDescription'] . '</td>';
            $output .= '<td>' . $game['gameLength'] . '</td>';
            $output .= '<td>' . $game['releaseYear'] . '</td>';
            $output .= '<td>';
            $output .= '<form action="deleteItem.php" method="post">';
            $output .= '<input type="hidden" name="gameID" value="' . $game['gameID'] . '">';
            $output .= '<button type="submit">Delete</button>';
            $output .= '</form>';
            $output .= '<form action="updateItem.php" method="get">';
            $output .= '<input type="hidden" name="gameID" value="' . $game['gameID'] . '">';
            $output .= '<button type="submit">Update</button>';
            $output .= '</form>';
            $output .= '</td>';
            $output .= '</tr>';
        }
        echo $output;
        ?>
    </table>
    <h2>Add a Game</h2>
    <form action="addItem.php" method="get">
        <button type="submit">Add Game</button>
    </form>
</body>

</html>