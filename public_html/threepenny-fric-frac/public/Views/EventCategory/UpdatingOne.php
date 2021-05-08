<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/EventCategory/updateOne/<?php echo $model['row']['Id']; ?>"
              class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event categorie</h2>
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
                <input type="hidden" id="Id" name="Id" value="<?php echo $model['row']['Id']; ?>"/>
                <div>
                    <label for="Name">Naam</label>
                    <input id="Name" name="Name" type="text" value="<?php echo $model['row']['Name']; ?>" required/>
                </div>
            </fieldset>
            <div class="feedback">
            </div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>