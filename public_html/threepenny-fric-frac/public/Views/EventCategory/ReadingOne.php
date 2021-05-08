<section class="show-room entity">
    <form id="form" method="" action="" class="detail">
        <nav class="command-panel">
            <h2 class="banner">EventCategorie</h2>
            <a href="/EventCategory/UpdatingOne/<?php echo $model['row']['Id'];?>" class="tile">
                <span class="icon-pencil"></span>
                <span class="screen-reader-text">Updating One</span>
            </a>
            <a href="/EventCategory/InsertingOne" class="tile">
                <span class="icon-plus"></span>
                <span class="screen-reader-text">Inserting One</span>
            </a>
            <a href="/EventCategory/deleteOne/<?php echo $model['row']['Id'];?>" class="tile">
                <span class="icon-bin"></span>
                <span class="screen-reader-text">Delete One</span>
            </a>
            <a href="/EventCategory/Index.php" class="tile">
                <span class="icon-cross"></span>
                <span class="screen-reader-text">Annuleren</span>
            </a>
        </nav>
        <fieldset>
            <div>
                <label for="Name">Naam</label>
                <span><?php echo $model['row']['Name']; ?></span>
            </div>
        </fieldset>
        <div class="feedback"></div>
    </form>
    <?php include('ReadingAll.php'); ?>
</section>