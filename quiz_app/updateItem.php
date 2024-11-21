<?php
include 'utils/ConnectionManager.php';
include 'utils/DataBaseConstants.php';

if (isset($_GET['gameID'])) {
    $gameID = $_GET['gameID'];
    $stmt = null;

    try {
        $connectionManager = new ConnectionManager(
            DatabaseConstants::$MYSQL_CONNECTION_STRING,
            DatabaseConstants::$MYSQL_USERNAME,
            DatabaseConstants::$MYSQL_PASSWORD
        );
        $conn = $connectionManager->getConnection();

        $stmt = $conn->prepare("SELECT * FROM Game WHERE gameID = :id");
        $stmt->bindParam(":id", $gameID);
        $boo = $stmt->execute();
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$game) {
            header("Location: error.php?err=Game not found");
            exit();
        }
    } catch (PDOException $ex) {
        header("Location: error.php?err='" . $ex->getMessage() . "'");
    } finally {
        if (!is_null($stmt)) {
            $stmt->closeCursor();
        }
    }
} else {
    header("Location: showItems.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Game</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgb(231, 231, 231);
        }

        label {
            margin-bottom: 5px;
            font-size: 14px;
            background-color: rgb(172, 255, 164);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Update Game</h1>
    <form action="updateItem2.php" method="post">
        <input type="hidden" name="gameID" value="<?php echo $game['gameID']; ?>">
        <label for="gameName">Game Name:</label>
        <input type="text" name="gameName" value="<?php echo $game['gameName']; ?>" required>
        <br>
        <label for="gameDescription">Description:</label>
        <input type="text" name="gameDescription" value="<?php echo $game['gameDescription']; ?>" required>
        <br>
        <label for="gameLength">Length (in hours):</label>
        <input type="number" name="gameLength" value="<?php echo $game['gameLength']; ?>" required>
        <br>
        <label for="releaseYear">Release Year:</label>
        <input type="number" name="releaseYear" value="<?php echo $game['releaseYear']; ?>" required>
        <br>
        <button type="submit">Update Game</button>
    </form>
</body>

</html>