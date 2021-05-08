<section class="show-room entity">
    <form id="form" method="post" action="/Event/CreateOne" class="detail">
        <nav class="command-panel">
            <h2 class="banner">EventCategory</h2>
            <button type="submit" value="insert" name="uc" class='tile'>
                <span class="icon-floppy-disk"></span>
                <span class="screen-reader-text">Insert One</span>
            </button>
            <a href="/Event/Index" class="tile">
                <span class="icon-cross"></span>
                <span class="screen-reader-text">Annuleren</span>
            </a>
        </nav>
        <fieldset>
            <div>
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" />
            </div>
        </fieldset>
        <div class="feedback">
            <p><?php echo $model['message']; ?></p>
            <p><?php echo isset($model['error']) ? $model['error'] : ''; ?></p>
        </div>
    </form>
    <?php include('ReadingAll.php'); ?>
</section>