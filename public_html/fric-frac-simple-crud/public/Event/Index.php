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
    <div class="detail">
        <nav class="command-panel">
            <h2 class="banner">Eventcategory</h2>
            <a href="InsertingOne.php" class="tile">Inserting One</a>
        </nav>
        <fieldset></fieldset>
        <div class="feedback">
        </div>
    </div>
    <?php include('ReadingAll.php'); ?>
</section>
<footer class="page-footer">
    <p>&copy Tim Janssens</p>
    <p>Opdracht Programmeren 4</p>
</footer>
</body>
</html>
