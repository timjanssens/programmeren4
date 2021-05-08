<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/User/createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Gebruiker</h2>
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
                    <label for="Salt">Zout</label>
                    <input type="text" id="Salt" name="Salt"/>
                </div>
                <div>
                    <label for="HashedPassword">Hash</label>
                    <input type="password" required id="HashedPassword" name="HashedPassword"/>
                </div>
                <div>
                    <label for="PersonId">Person</label>
                    <select id="PersonId" name="PersonId">
                        <?php
                        foreach ($model['listPerson'] as $Person) {
                            ?>
                            <option value="<?php echo $Person['Id'] ?>">
                                <?php echo $Person['LastName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="RoleId">Role</label>
                    <select id="RoleId" name="RoleId">
                        <?php
                        foreach ($model['listRole'] as $roleId) {
                            ?>
                            <option value="<?php echo $roleId['Id'] ?>">
                                <?php echo $roleId['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </fieldset>
            <div id="feedback">
                <p><?php echo $model['message']; ?></p>
                <p><?php echo isset($model['error']) ? $model['error'] : ''; ?></p>
            </div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>