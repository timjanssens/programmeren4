<main>
    <section class="show-room entity">
        <form id="form" method="" action="" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event categorie</h2>
                <a href="/EventCategory/UpdatingOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-pencil"></span>
                    <span class="screen-reader-text">Aanpassen</span>
                </a>
                <a href="/EventCategory/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Toevoegen</span>
                </a>
                <a href="/EventCategory/deleteOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-bin"></span>
                    <span class="screen-reader-text">Verwijderen</span>
                </a>
                <a href="/EventCategory/Index" class="tile">
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
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>