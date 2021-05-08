<section class="show-room entity">
    <div class="detail">
        <nav class="command-panel">
            <h2 class="banner">Event</h2>
            <a href="/Event/InsertingOne.php" class="tile">
                <span class="icon-plus"></span>
                <span class="screen-reader-text">InsertingOne</span>
            </a>
        </nav>
        <fieldset></fieldset>
        <div class="feedback">
            <p><?php echo $model['error']; ?></p>
        </div>
    </div>
    <?php include('ReadingAll.php'); ?>
</section>