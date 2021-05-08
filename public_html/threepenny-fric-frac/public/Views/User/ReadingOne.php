<main>
    <section class="show-room entity">
        <form id="form" method="" action="" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Gebruiker</h2>
                <a href="/User/updatingOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-pencil"></span>
                    <span class="screen-reader-text">Updating One</span>
                </a>
                <a href="/User/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Inserting One</span>
                </a>
                <a href="/User/deleteOne/<?php echo $model['row']['Id']; ?>" class="tile">
                    <span class="icon-bin"></span>
                    <span class="screen-reader-text">Delete One</span>
                </a>
                <a href="/User/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <label for="Name">Naam</label>
                    <input type="text" disabled=true id="Name" name="Name" value="<?php echo $model['row']['Name']; ?>" />
                </div>
                <div>
                    <label for="Salt">Zout</label>
                    <input type="text" disabled=true id="Salt" name="Salt" value="<?php echo $model['row']['Salt']; ?>" />
                </div>
                <div>
                    <label for="HashedPassword">Hash</label>
                    <input type="password" disabled=true id="HashedPassword" name="HashedPassword" readonly
                           value="<?php echo $model['row']['HashedPassword']; ?>" disabled />
                </div>
                <div>
                    <label for="PersonId">Person</label>
                    <select id="PersonId" name="PersonId" disabled=true>
                        <?php
                        foreach ($model['listPerson'] as $person) {
                            ?>
                            <option value="<?php echo $person['Id'] ?>"
                                <?php echo $model['row']['PersonId'] === $person['Id'] ? 'selected = "selected"' : ''; ?>>
                                <?php echo $person['LastName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="RoleId">Role</label>
                    <select id="RoleId" name="RoleId" disabled>
                        <?php
                        foreach ($model['listRole'] as $role) {
                            ?>
                            <option value="<?php echo $role['Id'] ?>"
                                <?php echo $model['row']['RoleId'] === $role['Id'] ? 'selected = "selected"' : ''; ?>>
                                <?php echo $role['Name'] ?></option>
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