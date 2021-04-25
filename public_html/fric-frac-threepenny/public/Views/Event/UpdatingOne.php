<section class="show-room entity">
    <form id="form" method="post" action="/Event/updateOne" class="detail">
        <nav class="command-panel">
            <h2 class="banner">Event</h2>
            <button type="submit" value="insert" name="uc" class='tile'>
                <span class="icon-floppy-disk"></span>
                <span class="screen-reader-text">Update One</span>
            </button>
            <a href="/Event/Index.php" class="tile">
                <span class="icon-cross"></span>
                <span class="screen-reader-text">Annuleren</span>
            </a>
        </nav>
        <fieldset>
            <input type="hidden" id="Id" name="Id" value="{placeholder}" />
            <div>
                <label for="Name">Naam</label>
                <input id="Name" name="Name" type="text"
                    value="<?php echo $model['row']['Name'];?>" required />
            </div>
            <div>
                <label for="Location">Locatie</label>
                <input id="Location" name="Location" type="text"
                    value="<?php echo $model['row']['Location'];?>" required />
            </div>
            <div>
                <label for="Starts">Start</label>
                <input id="Starts" name="Starts" type="datetime-local"
                    value="<?php echo $model['row']['Starts'];?>" />
            </div>
            <div>
                <label for="Ends">Einde</label>
                <input id="Ends" name="Ends" type="datetime-local"
                    value="<?php echo $model['row']['Ends'];?>" />
            </div>
            <div>
                <label for="Image">Afbeelding</label>
                <input id="Image" name="Image" type="text"
                    value="<?php echo $model['row']['Image'];?>" required />
            </div>
            <div>
                <label for="Description">Beschrijving</label>
                <input id="Description" name="Description" type="text"
                    value="<?php echo $model['row']['Description'];?>" required />
            </div>
            <div>
                <label for="OrganiserName">Organizator naam</label>
                <input id="OrganiserName" name="OrganiserName" type="text"
                    value="<?php echo $model['row']['OrganiserName'];?>" required />
            </div>
            <div>
                <label for="OrganiserDescription">Organizator beschrijving</label>
                <input id="OrganiserDescription" name="OrganiserDescription" type="text"
                    value="<?php echo $model['row']['OrganiserDescription'];?>" required />
            </div>
            <div>
                <label for="EventCategoryId">Event Category</label>
                <select id="EventCategoryId" name="EventCategoryId">
                <?php
                foreach ($model['listEventCategory'] as $eventCategory) {
                    ?>
                    <option value="<?php echo $eventCategory['Id'] ?>"
                    <?php echo $model['row']['EventCategoryId'] === $eventCategory['Id'] ? 'selected = "selected"' : '';?>>
                    <?php echo $eventCategory['Name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="EventTopicId">Event Topic</label>
                <select id="EventTopicId" name="EventTopicId">
                <?php
                foreach ($model['listEventTopic'] as $eventTopic) {
                ?>
                    <option value="<?php echo $eventTopic['Id'] ?>"
                    <?php echo $model['row']['EventTopicId'] === $eventTopic['Id'] ? 'selected = "selected"' : '';?>>
                    <?php echo $eventTopic['Name'] ?></option>
                <?php } ?>
                </select>
            </div>
        </fieldset>
        <div class="feedback"></div>
    </form>
    <?php include('ReadingAll.php'); ?>
</section>