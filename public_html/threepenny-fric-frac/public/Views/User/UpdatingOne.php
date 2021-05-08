<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/User/updateOne/<?php echo $model['row']['Id'];?>" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Rol</h2>
                <button type="submit" value="insert" name="uc" class='tile'>
                    <span class="icon-floppy-disk"></span>
                    <span class="screen-reader-text">Update One</span>
                </button>
                <a href="/User/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>
                <div>
                    <input type="hidden" id="Id" name="Id" value="<?php echo $model['row']['Id']; ?>"/>
                </div>
                <div>
                    <label for="Name">Naam</label>
                    <input type="text" id="Name" name="Name" value="<?php echo $model['row']['Name']; ?>"/>
                </div>
                <div>
                    <label for="Salt">Zout</label>
                    <input type="text" id="Salt" name="Salt" value="<?php echo $model['row']['Salt']; ?>"/>
                </div>
                <div>
                    <label for="HashedPassword">Hash</label>
                    <input type="text" required id="HashedPassword" name="HashedPassword"
                           value="<?php echo $model['row']['HashedPassword']; ?>"/>
                </div>
                <div>
                    <label for="PersonId">Person</label>
                    <select id="PersonId" name="PersonId">
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
                    <select id="RoleId" name="RoleId">
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