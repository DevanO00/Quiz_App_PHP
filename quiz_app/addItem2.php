<?php
include 'utils/ConnectionManager.php';
include 'utils/DataBaseConstants.php';
$stmt = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        $stmt = $conn->prepare("INSERT INTO 
        Game (gameName, gameDescription, gameLength, releaseYear) 
        VALUES (:gName, :gDesc, :gLength, :rYear)");

        $stmt->bindParam(':gName', $gameName);
        $stmt->bindParam(':gDesc', $gameDescription);
        $stmt->bindParam(':gLength', $gameLength);
        $stmt->bindParam(':rYear', $releaseYear);

        $boo = $stmt->execute();
        $rowsAdded = $stmt->rowCount();
        if ($rowsAdded === 1) {
            header("Location: showItems.php");
        } else {
            header("Location: error.php?err=nothing added");
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
