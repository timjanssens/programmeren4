<main>
    <section class="show-room entity">
        <form id="form" method="" action="" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Event</h2>
                <a href="/Event/updatingOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-pencil"></span>
                    <span class="screen-reader-text">Updating One</span>
                </a>
                <a href="/Event/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Inserting One</span>
                </a>
                <a href="/Event/deleteOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-bin"></span>
                    <span class="screen-reader-text">Delete One</span>
                </a>
                <a href="/Event/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <label for="Name">Naam</label>
                    <input id="Name" name="Name" type="text"
                           value="<?php echo $model['row']['Name']; ?>" disabled/>
                </div>
                <div>
                    <label for="Location">Locatie</label>
                    <input id="Location" name="Location" type="text"
                           value="<?php echo $model['row']['Location']; ?>" disabled/>
                </div>
                <div>
                    <label for="Starts">Start</label>
                    <input id="Starts" name="Starts" type="text"
                           value="<?php echo $model['row']['Starts']; ?>" disabled/>
                </div>
                <div>
                    <label for="Ends">Einde</label>
                    <input id="Ends" name="Ends" type="text"
                           value="<?php echo $model['row']['Ends']; ?>" disabled/>
                </div>
                <div>
                    <label for="Image">Afbeelding</label>
                    <input id="Image" name="Image" type="text"
                           value="<?php echo $model['row']['Image']; ?>" disabled/>
                </div>
                <div>
                    <label for="Description">Beschrijving</label>
                    <input id="Description" name="Description" type="text"
                           value="<?php echo $model['row']['Description']; ?>" disabled/>
                </div>
                <div>
                    <label for="OrganiserName">Organisator naam</label>
                    <input id="OrganiserName" name="OrganiserName" type="text"
                           value="<?php echo $model['row']['OrganiserName']; ?>" disabled/>
                </div>
                <div>
                    <label for="OrganiserDescription">Organisator beschrijving</label>
                    <input id="OrganiserDescription" name="OrganiserDescription" type="text"
                           value="<?php echo $model['row']['OrganiserDescription']; ?>" disabled/>
                </div>
                <div>
                    <label for="EventCategoryId">Event Category</label>
                    <select id="EventCategoryId" name="EventCategoryId" disabled>
                        <?php
                        foreach ($model['listEventCategory'] as $eventCategory) {
                            ?>
                            <option value="<?php echo $eventCategory['Id'] ?>"
                                <?php echo $model['row']['EventCategoryId'] === $eventCategory['Id'] ? 'selected = "selected"' : ''; ?>>
                                <?php echo $eventCategory['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="EventTopicId">Event Topic</label>
                    <select id="EventTopicId" name="EventTopicId" disabled>
                        <?php
                        foreach ($model['listEventTopic'] as $eventTopic) {
                            ?>
                            <option value="<?php echo $eventTopic['Id'] ?>"
                                <?php echo $model['row']['EventTopicId'] === $eventTopic['Id'] ? 'selected = "selected"' : ''; ?>>
                                <?php echo $eventTopic['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </fieldset>
            <div class="feedback"></div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>