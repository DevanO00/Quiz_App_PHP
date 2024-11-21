<?php
include 'utils/ConnectionManager.php';
include 'utils/DataBaseConstants.php';

$stmt = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gameID = $_POST['gameID'];
    try {
        $connectionManager = new ConnectionManager(
            DatabaseConstants::$MYSQL_CONNECTION_STRING,
            DatabaseConstants::$MYSQL_USERNAME,
            DatabaseConstants::$MYSQL_PASSWORD
        );
        $conn = $connectionManager->getConnection();

        $stmt = $conn->prepare("DELETE FROM Game WHERE gameID = :id");
        $stmt->bindParam(':id', $gameID);
        $stmt->execute();
        $rowsDeleted = $stmt->rowCount();

        if ($rowsDeleted === 1) {
            header('Location: showItems.php');
        } else {
            header('Location: error.php?err=nothing deleted');
        }
    } catch (PDOException $ex) {
        header("Location: error.php?err='" . $e->getMessage() . "'");
    } finally {
        if (!is_null($stmt))
            $stmt->closeCursor();
    }
} else {
    header('Location: showItems.php');
}
