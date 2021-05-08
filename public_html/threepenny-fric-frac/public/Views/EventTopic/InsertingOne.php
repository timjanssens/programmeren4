<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/EventTopic/createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event Topic</h2>
                <button type="submit" value="insert" name="uc" class='tile'>
                    <span class="icon-floppy-disk"></span>
                    <span class="screen-reader-text">Toevoegen</span>
                </button>
                <a href="/EventTopic/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <label for="Name">Naam</label>
                    <input type="text" required id="Name" name="Name"/>
                </div>
            </fieldset>
            <div class="feedback">
                <p><?php echo $model['message']; ?></p>
                <p><?php echo isset($model['error']) ? $model['error'] : ''; ?></p>
            </div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>