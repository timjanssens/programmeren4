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
        <form id="form" method="post" action="createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event topic</h2>
                <div class="links">
                    <a class="tile" href="#">
                        <span aria-hidden="true" class="icon-pencil"></span>
                        <span class="screen-reader-text">updating</span>
                    </a>
                    <a class="tile" href="InsertingOne.php">
                        <span aria-hidden="true" class="icon-plus"></span>
                        <span class="screen-reader-text">Insert</span>
                    </a>
                    <a class="tile" href="#">
                        <span aria-hidden="true" class="icon-bin"></span>
                        <span class="screen-reader-text">Delete</span>
                    </a>
                    <a class="tile" href="Index.php">
                        <span aria-hidden="true" class="icon-cross"></span>
                        <span class="screen-reader-text">Cancel</span>
                    </a>
                </div>
            </nav>

            <fieldset>
                <div class="row">
                    <div class="col-25">
                        <label for="Name">Naam</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="Name" name="Name" />
                    </div>
                </div>
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