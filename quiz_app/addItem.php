<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Game</title>
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
    <h1>Add a New Game</h1>
    <form action="addItem2.php" method="post">
        <label for="gameName">Game Name:</label>
        <input type="text" name="gameName" id="gameName" required>
        <br>
        <label for="gameDescription">Description:</label>
        <input type="text" name="gameDescription" id="gameDescription" required>
        <br>
        <label for="gameLength">Length (in hours):</label>
        <input type="number" name="gameLength" id="gameLength" required>
        <br>
        <label for="releaseYear">Release Year:</label>
        <input type="number" name="releaseYear" id="releaseYear" required>
        <br>
        <button type="submit">Add Game</button>
    </form>
</body>

</html>