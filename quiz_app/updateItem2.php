<?php
include 'utils/ConnectionManager.php';
include 'utils/DataBaseConstants.php';

$stmt = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gameID = $_POST['gameID'];
    $gameName = $_POST['gameName'];
    $gameDescription = $_POST['gameDescription'];
    $gameLength = $_POST['gameLength'];
    $releaseYear = $_POST['releaseYear'];

    try {
        $connectionManager = new ConnectionManager(
            DatabaseConstants::$MYSQL_CONNECTION_STRING,
            DatabaseConstants::$MYSQL_USERNAME,
            DatabaseConstants::$MYSQL_PASSWORD
        );
        $conn = $connectionManager->getConnection();
        $stmt = $conn->prepare("UPDATE Game 
        SET gameName = :gName,
        gameDescription = :gDesc,
        gameLength = :gLength,
        releaseYear = :rYear
        WHERE gameID = :id");

        $stmt->bindParam(':id', $gameID);
        $stmt->bindParam(":gName", $gameName);
        $stmt->bindParam(":gDesc", $gameDescription);
        $stmt->bindParam(":gLength", $gameLength);
        $stmt->bindParam(":rYear", $releaseYear);

        $boo = $stmt->execute();
        $rowsChanged = $stmt->rowCount();

        if ($rowsChanged === 1) {
            header("Location: showItems.php");
        } else {
            header("Location: error.php?err=nothing changed");
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
