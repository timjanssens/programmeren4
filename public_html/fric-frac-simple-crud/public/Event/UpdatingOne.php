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
    <section class="show-room entity">
        <form id="form" method="post" action="createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event topic</h2>
                <div class="links">
                    <a class="tile" href="#">
                        <span aria-hidden="true" class="icon-floppy-disk"></span>
                        <span class="screen-reader-text">Insert</span>
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
                        <input type="text" required id="Name" name="Name"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Location">Locatie</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="Location" name="Location"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Starts">Start</label>
                    </div>
                    <div class="col-75">
                        <input type="date" required id="Starts" name="Starts"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Ends">Einde</label>
                    </div>
                    <div class="col-75">
                        <input type="date" required id="Ends" name="Ends"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Image">Foto</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="Image" name="Image"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Description">Beschrijving</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="Description" name="Description"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="OrganiserName">Organisator naam</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="OrganiserName" name="OrganiserName"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="OrganiserDescription">Organisator naam</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="OrganiserDescription"
                               name="OrganiserDescription"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="EventCategoryId">EventCategoryId</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="EventCategoryId"
                               name="EventCategoryId"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="EventCategoryId">EventCategoryId</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="EventCategoryId"
                               name="EventCategoryId"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="EventTopicId">EventTopicId</label>
                    </div>
                    <div class="col-75">
                        <input type="text" required id="EventTopicId"
                               name="EventTopicId"/>
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
