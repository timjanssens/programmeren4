<?php
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fric-frac simple CRUD</title>

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
    <section class="show-room entity">
        <form id="form" method="post" action="createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event category</h2>
                <div class="links">
                    <a class="tile" href="InsertingOne.php">
                        <span aria-hidden="true" class="icon-plus"></span>
                        <span class="screen-reader-text">Event category</span>
                    </a>
                </div>
            </nav>

            <fieldset>


            </fieldset>

        </form>

        <div id="feedback"></div>
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
