<?php
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fric-frac simple CRUD</title>
    <link rel="stylesheet" type="text/css" href="../css/icon-font.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css">
</head>

<body class="page">
<header class="page-header">
    <nav class="control-panel">
        <a class="tile" href="/index.php">
            <span aria-hidden="true" class="icon-menu"></span>
            <span class="screen-reader-text">Admin index</span>
        </a>
    </nav>
    <h1 class="banner">Fric-frac</h1>
</header>



<main>

    <section class="detail">
        <nav class="command-panel">
            <h2 class="banner">Event index</h2>
            <div class="links">
                <a class="tile" href="InsertingOne.php">
                    <span aria-hidden="true" class="icon-plus"></span>
                    <span class="screen-reader-text">Event</span>
                </a>
            </div>
        </nav>
        <fieldset></fieldset>
        <div class="feedback">
        </div>
    </section>

    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>


<footer class="page-footer">
    <p>&copy Tim Janssens</p>
    <p>Opdracht Programmeren 4</p>
</footer>

</body>
</html>