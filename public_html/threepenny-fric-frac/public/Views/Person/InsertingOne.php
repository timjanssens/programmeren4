<main>
    <section class="show-room entity">
        <form id="form" method="post" action="/Person/createOne" class="detail">
            <nav class="command-panel">
                <h2 class="banner">Persoon</h2>
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
                    <label for="FirstName">Voornaam</label>
                    <input type="text" required id="FirstName" name="FirstName" />
                </div>
                <div>
                    <label for="LastName">Achternaam</label>
                    <input type="text" required id="LastName" name="LastName" />
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="email"  id="Email" name="Email" />
                </div>
                <div>
                    <label for="Address1">Adres 1</label>
                    <input type="text"  id="Address1" name="Address1" />
                </div>
                <div>
                    <label for="Address2">Adres 2</label>
                    <input type="text"  id="Address2" name="Address2" />
                </div>
                <div>
                    <label for="PostalCode">Postcode</label>
                    <input type="text"  id="PostalCode" name="PostalCode" />
                </div>
                <div>
                    <label for="City">Stad</label>
                    <input type="text"  id="City" name="City" />
                </div>
                <div>

                    <label for="CountryId">Land</label>
                    <select id="CountryId" name="CountryId">
                        <?php
                        foreach ($model['listCountry'] as $country) {
                            ?>
                            <option value="<?php echo $country['Id'] ?>">
                                <?php echo $country['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>

                    <label for="Phone1">Telefoon 1</label>
                    <input type="text"  id="Phone1" name="Phone1" />
                </div>
                <div>
                    <label for="Birthday">Geboortedatum</label>
                    <input type="date"  id="Birthday" name="Birthday" />
                </div>
                <div>
                    <label for="Rating">Tevredenheid</label>
                    <input type="range"  id="Rating" name="Rating" min="0" max="10" />


                </div>
            </fieldset>
            <div id="feedback"></div>
        </form>
    </section>
    <aside>
        <?php include('ReadingAll.php'); ?>
    </aside>
</main>