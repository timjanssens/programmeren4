<main>
    <section class="show-room entity">
        <div class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event topic</h2>
                <a href="/EventTopic/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">InsertingOne</span>
                </a>
            </nav>
            <fieldset>

            </fieldset>
            <div class="feedback">
                <p><?php echo $model['message']; ?></p>
                <p><?php echo isset($model['error']) ? $model['error'] : ''; ?></p>
            </div>
        </div>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>