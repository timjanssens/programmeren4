<!--<header class="page-header">-->
<!--    <nav class="control-panel">-->
<!--        <a href="/index.php" class="tile">-->
<!--            <span class="icon-menu"></span>-->
<!--            <span class="screen-reader-text">Admin index</span>-->
<!--        </a>-->
<!--    </nav>-->
<!--    <h1 class="banner">Fric-frac</h1>-->
<!--</header>-->
<section class="show-room entity">
    <form id="form" method="post" action="/EventCategory/updateOne/<?php echo $model['row']['Id'];?>" class="detail">
        <nav class="command-panel">
            <h2 class="banner">EventCategorie</h2>
            <button type="submit" value="insert" name="uc" class='tile'>
                <span class="icon-floppy-disk"></span>
                <span class="screen-reader-text">Update One</span>
            </button>
            <a href="/EventCategory/Index" class="tile">
                <span class="icon-cross"></span>
                <span class="screen-reader-text">Annuleren</span>
            </a>
        </nav>
        <fieldset>
            <input type="hidden" id="Id" name="Id" value="<?php echo $model['row']['Id'];?>" />
            <div>
                <label for="Name">Naam</label>
                <input id="Name" name="Name" type="text" value="<?php echo $model['row']['Name']; ?>" required />
            </div>
        </fieldset>
        <div class="feedback">
        </div>
    </form>
    <?php include('ReadingAll.php'); ?>
</section>

