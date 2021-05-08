<main>
    <section class="show-room entity">
        <form id="form" method="" action="" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Rol</h2>
                <a href="/Role/updatingOne/<?php echo $model['row']['Id'];?>" class="tile">
                    <span class="icon-pencil"></span>
                    <span class="screen-reader-text">Updating One</span>
                </a>
                <a href="/Role/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Inserting One</span>
                </a>
                <a href="/Role/deleteOne/<?php echo $model['row']['Id'];?>" class="tile">
                    <span class="icon-bin"></span>
                    <span class="screen-reader-text">Delete One</span>
                </a>
                <a href="/Role/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <label for="Name">Naam</label>
                    <input id="Name" name="Name" type="text" value="<?php echo $model['row']['Name']; ?>" disabled />
                </div>
            </fieldset>
            <div class="feedback"></div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>