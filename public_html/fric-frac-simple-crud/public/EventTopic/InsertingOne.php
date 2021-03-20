<?php
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fric-frac simple CRUD</title>
</head>
<body class="editor">
<header class="page-header">
    <nav class="control-panel">
        <a href="/index.php" class="tile">Admin</a>
    </nav>
    <h1 class="banner">Fric-frac</h1>
</header>
<section class="show-room entity">
    <form id="form" method="post" action="createOne" class="detail">
        <nav class="command-panel">
            <h2 class="banner">EventTopic</h2>
            <button type="submit" value="insert" name="uc" class='tile'>Insert</button>
            <a href="Index.php" class="tile">Annuleren</a>
        </nav>
        <fieldset>
            <div>
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" />
            </div>
        </fieldset>
        <div id="feedback"></div>
    </form>
    <?php include('ReadingAll.php'); ?>
</section>
<footer class="page-footer">
    <p>&copy Tim Janssens</p>
    <p>Opdracht Programmeren 4</p>
</footer>
</body>
</html>
