
<!DOCTYPE html>
<html>

<head>
    <title>PHP formulier werken met PHP</title>
    <meta charset="utf-8" />
    <meta name="application-name" content="PHP form">
    <meta name="description" content="Formulieren html en PHP">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="author" content="Tim Janssens">
</head>

<body>
</body>
    <p>Visuele voorstelling van een associatieve array of dictionary in PHP</p>
    <p><?php echo var_dump($_POST); ?></p>
<p><?php echo print_r($_POST); ?></p>

<article>
    <ol>
        <li>Naam:
            <?php echo isset($_POST['firstname']) ? $_POST['firstname'] : 'Naam niet opgegeven!'; ?>
        </li>
        <li>Familienaam:
            <?php echo isset($_POST['lastname']) ? $_POST['lastname'] : 'Naam niet opgegeven!'; ?>
        </li>
        <li>Email: :
            <?php echo isset($_POST['mail']) ? $_POST['mail'] : 'Email niet opgegeven!'; ?>
        </li>
        <li>Paswoord:
            <?php echo isset($_POST['password1']) ? $_POST['password1'] : 'Paswoord niet opgegeven!'; ?>
        </li>
        <li>Paswoord herhaling:
            <?php echo isset($_POST['password2']) ? $_POST['password2'] : 'Passwoord herhaling niet opgegeven!'; ?>
        </li>
        <li>Adres:
            <?php echo isset($_POST['address1']) ? $_POST['address1'] : 'Adres niet opgegeven!'; ?>
        </li>
        <li>Adres 2:
            <?php echo isset($_POST['address2']) ? $_POST['address2'] : 'Adres niet opgegeven!'; ?>
        </li>
        <li>Postcode:
            <?php echo isset($_POST['postalcode']) ? $_POST['postalcode'] : 'Postcode niet opgegeven!'; ?>
        </li>
        <li>Stad:
            <?php echo isset($_POST['city']) ? $_POST['city'] : 'Stad niet opgegeven!'; ?>
        </li>
        <li>Land:
            <?php echo isset($_POST['countrycode']) ? $_POST['countrycode'] : 'Landcode niet opgegeven!'; ?>
        </li>
        <li>Gsm-nummer:
            <?php echo isset($_POST['gsm']) ? $_POST['gsm'] : 'Gsm niet opgegeven!'; ?>
        </li>
        <li>Geboortedatum:
            <?php echo isset($_POST['birthday']) ? $_POST['birthday'] : 'Geboortedatum niet opgegeven!'; ?>
        </li>
        <li>Tevredenheid:
            <?php echo isset($_POST['satisfied']) ? $_POST['satisfied'] : 'Tevredenheid niet opgegeven!'; ?>
        </li>
        <li>Richting:
            <?php echo isset($_POST['faculty']) ? $_POST['faculty'] : 'Richting niet opgegeven!'; ?>
        </li>
        <li>Cursussen:
            <?php echo isset($_POST['course']) ? $_POST['course'] : 'Cursussen niet opgegeven!'; ?>
        </li>
    </ol>
</article>
</html>