<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/Event/createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event</h2>
                <button type="submit" value="insert" name="uc" class='tile'>
                    <span class="icon-floppy-disk"></span>
                    <span class="screen-reader-text">Insert One</span>
                </button>
                <a href="Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <label for="Name">Naam</label>
                    <input type="text" required id="Name" name="Name"/>
                </div>
                <div>
                    <label for="Location">Locatie</label>
                    <input type="text" required id="Location" name="Location"/>
                </div>
                <div>
                    <label for="Starts">Startdatum</label>
                    <input type="datetime-local" required id="Starts" name="Starts"/>
                </div>
                <div>
                    <label for="Ends">Einddatum</label>
                    <input type="datetime-local" required id="Ends" name="Ends"/>
                </div>
                <div>
                    <label for="Image">Afbeelding</label>
                    <input type="url" required id="Image" name="Image"/>
                </div>
                <div>
                    <label for="Description">Omschrijving</label>
                    <input type="text" required id="Description" name="Description"/>
                </div>
                <div>
                    <label for="OrganiserName">Organisator naam</label>
                    <input type="text" required id="OrganiserName" name="OrganiserName"/>
                </div>
                <div>
                    <label for="OrganiserDescription">Organisator Omschrijving</label>
                    <input type="text" required id="OrganiserDescription" name="OrganiserDescription"/>
                </div>

                <div>
                    <label for="EventCategoryId">Event Category</label>
                    <select id="EventCategoryId" name="EventCategoryId">
                        <?php
                        foreach ($model['listEventCategory'] as $eventCategory) {
                            ?>
                            <option value="<?php echo $eventCategory['Id'] ?>">
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
                            <option value="<?php echo $eventTopic['Id'] ?>">
                                <?php echo $eventTopic['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </fieldset>
            <div id="feedback"></div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>