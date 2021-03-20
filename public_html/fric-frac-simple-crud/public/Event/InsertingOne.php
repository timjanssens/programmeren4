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
            <h2 class="banner">Event</h2>
            <button type="submit" value="insert" name="uc" class='tile'>Insert</button>
            <a href="Index.php" class="tile">Annuleren</a>
        </nav>
        <fieldset>
            <div>
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" />
            </div>
            <div>
                <label for="Location">Locatie</label>
                <input type="text" required id="Location" name="Location" />
            </div>
            <div>
                <label for="Starts">Start</label>
                <input type="date" required id="Starts" name="Starts" />
            </div>
            <div>
                <label for="Ends">Einde</label>
                <input type="date" required id="Ends" name="Ends" />
            </div>
            <div>
                <label for="Image">Foto</label>
                <input type="text" required id="Image" name="Image" />
            </div>
            <div>
                <label for="Description">Beschrijving</label>
                <input type="text" required id="Description" name="Description" />
            </div>
            <div>
                <label for="OrganiserName">Organisator naam</label>
                <input type="text" required id="OrganiserName" name="OrganiserName" />
            </div>
            <div>
                <label for="OrganiserDescription">Organisator naam</label>
                <input type="text" required id="OrganiserDescription" name="OrganiserDescription" />
            </div>
            <div>
                <label for="EventCategoryId">EventCategoryId</label>
                <input type="text" required id="EventCategoryId" name="EventCategoryId" />
            </div>
            <div>
                <label for="EventCategoryId">EventCategoryId</label>
                <input type="text" required id="EventCategoryId" name="EventCategoryId" />
            </div>
            <div>
                <label for="EventTopicId">EventTopicId</label>
                <input type="text" required id="EventTopicId" name="EventTopicId" />
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
