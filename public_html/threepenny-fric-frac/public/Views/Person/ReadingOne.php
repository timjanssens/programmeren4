<main>
    <section class="show-room entity">
        <form id="form" method="" action="" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Persoon</h2>
                <a href="/Person/updatingOne/<?php echo $model['row']['Id'];?>" class="tile">
                    <span class="icon-pencil"></span>
                    <span class="screen-reader-text">Updating One</span>
                </a>
                <a href="/Person/InsertingOne" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Inserting One</span>
                </a>
                <a href="/Person/deleteOne/<?php echo $model['row']['Id'];?>" class="tile">
                    <span class="icon-bin"></span>
                    <span class="screen-reader-text">Delete One</span>
                </a>
                <a href="/Person/Index" class="tile">
                    <span class="icon-cross"></span>
                    <span class="screen-reader-text">Annuleren</span>
                </a>
            </nav>
            <fieldset>

                <input type="hidden" id="Id" name="Id" value="<?php echo $model['row']['Id'];?>" />
                <div>
                    <label for="FirstName">Voornaam</label>
                    <input id="FirstName" name="FirstName" type="text"
                           value="<?php echo $model['row']['FirstName'];?>" disabled/>
                </div>
                <div>
                    <label for="LastName">Achternaam</label>
                    <input id="LastName" name="LastName" type="text"
                           value="<?php echo $model['row']['LastName'];?>" disabled/>
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="email"  id="Email" name="Email" value="<?php echo $model['row']['Email'];?>" disabled/>
                </div>
                <div>
                    <label for="Address1">Adres 1</label>
                    <input type="text"  id="Address1" name="Address1" value="<?php echo $model['row']['Address1'];?>" disabled/>
                </div>
                <div>
                    <label for="Address2">Adres 2</label>
                    <input type="text"  id="Address2" name="Address2" value="<?php echo $model['row']['Address2'];?>" disabled/>
                </div>
                <div>
                    <label for="PostalCode">Postcode</label>
                    <input type="text"  id="PostalCode" name="PostalCode" value="<?php echo $model['row']['PostalCode'];?>" disabled/>
                </div>
                <div>
                    <label for="City">Stad</label>
                    <input type="text"  id="City" name="City" value="<?php echo $model['row']['City'];?>" disabled/>
                </div>
                <div>
                    <label for="CountryId">Land</label>
                    <select id="CountryId" name="CountryId" disabled>
                        <?php
                        foreach ($model['listCountry'] as $country) {
                            ?>
                            <option  value="<?php echo $country['Id'] ?>"
                                <?php echo $model['row']['CountryId'] === $country['Id'] ? 'selected = "selected"' : '';?>>
                                <?php echo $country['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>

                    <label for="Phone1">Telefoon 1</label>
                    <input type="text"  id="Phone1" name="Phone1"
                           value="<?php echo $model['row']['Phone1'];?>" disabled />
                </div>
                <div>
                    <label for="Birthday">Geboortedatum</label>
                    <input type="text"  id="Birthday" name="Birthday"
                           value="<?php echo $model['row']['Birthday'];?>" disabled/>
                </div>
                <div>
                    <label for="Rating">Tevredenheid</label>
                    <input disabled = true type="range"  id="Rating" name="Rating" min="0" max="10" value="<?php echo $model['row']['Rating'];?>" disabled/>
                </div>

            </fieldset>
            <div class="feedback"></div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>