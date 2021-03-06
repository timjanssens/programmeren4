<?php


$firstnameErr = $lastnameErr = $mailErr = $password1Err = $password2Err = $address1Err
    = $birthdayErr = $postalcodeErr = $cityErr = $sexErr = $passwordNotMatchErr = "";
$firstname = $lastname = $mail = $password1 = $password2 = $address1 = $address2 = $country
    = $birthday = $postalcode = $gsm = $city = $satisfied = $sex = $course = $faculty = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Voornaam is verplicht";
    } else {
        $firstname = test_input($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Familienaam is verplicht";
    } else {
        $lastname = test_input($_POST["lastname"]);
    }

    if (empty($_POST["mail"])) {
        $mailErr = "Email is verplicht";
    } else {
        $mail = test_input($_POST["mail"]);
    }

    if (empty($_POST["mail"])) {
        $mailErr = "Email is verplicht";
    } else {
        $mail = test_input($_POST["mail"]);
        // check if e-mail address is well-formed
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "Ongeldig email formaat";
        }
    }

    // Validate password strength
    $password1 = test_input($_POST["password1"]);
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number = preg_match('@[0-9]@', $password1);
    $specialChars = preg_match('@[^\w]@', $password1);


    if (empty($_POST["password1"])) {
        $password1Err = "Paswoord is verplicht";
    } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) { //
        $passwordNotMatchErr = 'Paswoord moet minstens 8 tekens bevateene en moet een hoofletter, een nummer en een speciaal teken bevatten.';
    } else {
        $password1 = test_input($_POST["password1"]);
    }


    if (empty($_POST["password2"])) {
        $password2Err = "Paswoord is verplicht";
    } else {
        $password2 = test_input($_POST["password2"]);
    }

    if ($_POST["password1"] != $_POST["password2"]) {
        $passwordNotMatchErr = "Paswoorden zijn niet identiek";
    }

    if (empty($_POST["address1"])) {
        $address1Err = "Adres is verplicht";
    } else {
        $address1 = test_input($_POST["address1"]);
    }

    if (empty($_POST["address2"])) {
        $address2 = "";
    } else {
        $address2 = test_input($_POST["address2"]);
    }

    if (empty($_POST["postalcode"])) {
        $postalcodeErr = "Postcode is verplicht";
    } else {
        $postalcode = test_input($_POST["postalcode"]);
    }


    if (empty($_POST["city"])) {
        $cityErr = "Adres is verplicht";
    } else {
        $city = test_input($_POST["city"]);
    }

    if (empty($_POST["gsm"])) {
        $gsm = "";
    } else {
        $gsm = test_input($_POST["gsm"]);
    }

    if (empty($_POST["birthday"])) {
        $birthdayErr = "Geboortedatum is verplicht";
    } else {
        $birthday = test_input($_POST["birthday"]);
    }

    if (empty($_POST["satisfied"])) {
        $satisfied = "";
    } else {
        $satisfied = test_input($_POST["satisfied"]);
    }

    if (empty($_POST["sex"])) {
        $sexErr = "Geslacht is verplicht";
    } else {
        $sex = $_POST["sex"];
    }

    if ($_POST['countryCode'] == "") {
        $country = "";
    } else {
        $country = test_input($_POST["countryCode"]);
    }

    if ($_POST['faculty'] == "") {
        $faculty = "";
    } else {
        $faculty = test_input($_POST["faculty"]);
    }

//    if ($_POST['course'] == "") {
    if (empty($_POST['course'])) { //check if array is empty
        $course = "";
    } else {
        $course = $_POST["course"];
    }

  //   fomrulier laden wanneer alle velden correct zijn ingevuld
    if ($lastnameErr == "" && $firstnameErr == "") {
        header('location: visualiseren-form-data.php');
        exit();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tim's website">
    <meta name="keywords" content="testing, forms, PHP, CSS3, HTML5 ">
    <meta name="author" content="Tim Janssens">
    <meta name="date" content="20210225">
    <title>Form document</title>

    <link rel="stylesheet" href="./style/style.css">

</head>

<body>


<form method="Post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<!--    <form method="Post" action="visualiseren-form-data.php">-->


    <p>Vul het registratieformulier in. Velden met een <span class="error">*</span> zijn verplicht.</p>
    <fieldset>
        <legend>Accountgegevens</legend>
        <div class="row">
            <div class="col-25">
                <label for="firstname">Voornaam <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="text" id="firstname" name="firstname" autofocus value="<?php echo $firstname; ?>"
                <--required-->
                <span class="error"><?php echo $firstnameErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lastname">Familienaam <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" <--required-->
                <span class="error"><?php echo $lastnameErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="mail">Email adres <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="email" id="mail" name="mail" placeholder="name@example.com" value="<?php echo $mail; ?>"
                <--required-->
                <span class="error"><?php echo $mailErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password1">Paswoord <span class="error">*</span> </label>
            </div>
            <div class="col-75">
                <input type="password" id="password1" name="password1" <--required-->
                <span class="error"><?php echo $password1Err; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password2">Bevestigpaswoord <span class="error">*</span>
                    <br> min 8 karakters, 1 cijfer 1hoofdletter</label>
            </div>
            <div class="col-75">
                <input type="password" id="password2" name="password2" <--required-->
                <span class="error"><?php echo $password2Err; ?></span>
                <span class="error"><?php echo $passwordNotMatchErr; ?></span>
            </div>
        </div>
    </fieldset>


    <fieldset>
        <legend>Adresgegevens</legend>
        <div class="row">
            <div class="col-25">
                <label for="address1">Adres 1 <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>">
                <span class="error"><?php echo $address1Err; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="address2">Adres 2 </label>
            </div>
            <div class="col-75">
                <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="postalcode">Postcode <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="text" id="postalcode" name="postalcode" value="<?php echo $postalcode; ?>" <--required-->
                <span class="error"><?php echo $postalcodeErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="city">Stad <span class="error">*</span> </label>
            </div>
            <div class="col-75">
                <input type="text" id="city" name="city" value="<?php echo $city; ?>" <--required-->
                <span class="error"><?php echo $cityErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="countryCode">Kies een land <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <select id="countryCode" name="countryCode" value="<?php echo $country; ?>">
                    <option <?php if (isset($country) && $country == "BE") echo "selected"; ?> value="BE">Belgie
                    </option>
                    <option <?php if (isset($country) && $country == "DE") echo "selected"; ?> value="DE">Duitsland
                    </option>
                    <option <?php if (isset($country) && $country == "FR") echo "selected"; ?> value="FR">Frankrijk
                    </option>
                    <option <?php if (isset($country) && $country == "LU") echo "selected"; ?> value="LU">Luxemburg
                    </option>
                    <option <?php if (isset($country) && $country == "NL") echo "selected"; ?> value="NL">Nederland
                    </option>
                    <option <?php if (isset($country) && $country == "UK") echo "selected"; ?> value="UK">Verenigd
                        Koninkrijk
                    </option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Persoonlijke gegevens</legend>
        <div class="row">
            <div class="col-25">
                <label for="gsm">Gsm</label>
            </div>
            <div class="col-75">
                <input type="tel" id="gsm" name="gsm" value="<?php echo $gsm; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="birthday">Geboortedatum <span class="error">*</span></label>
            </div>
            <div class="col-75">
                <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>">
                <span class=" error"><?php echo $birthdayErr; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="satisfied">Hoe tevreden ben je?</label>
            </div>
            <div class="col-75">
                <input type="range" id="satisfied" name="satisfied" value="<?php echo $satisfied; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input type="radio" name="sex" value="man" <?php if (isset($sex) && $sex == "man") echo "checked"; ?>
                       id="male">
            </div>
            <div class="col-75">
                <label for="male">Man</label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input type="radio" name="sex"
                       value="vrouw" <?php if (isset($sex) && $sex == "vrouw") echo "checked"; ?> id="female">
            </div>
            <div class="col-75">
                <label for="female">Vrouw</label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input type="radio" name="sex" value="noch man noch vrouw"
                       id="unknown" <?php if (isset($sex) && $sex == "noch man noch vrouw") echo "checked"; ?>>
            </div>
            <div class="col-75">
                <label for="unknown">Onbekend</label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="faculty">Kies een opleiding</label>
            </div>
            <div class="col-75">
                <select id="faculty" name="faculty">
                    <option <?php if (isset($faculty) && $faculty == "PRO") echo "selected"; ?> value="PRO">Graduaat
                        Programmeren
                    </option>
                    <option <?php if (isset($faculty) && $faculty == "SNB") echo "selected"; ?> value="SNB">Graduaat
                        SNB
                    </option>
                    <option <?php if (isset($faculty) && $faculty == "IOT") echo "selected"; ?> value="IOT">Graduaat
                        IOT
                    </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="course">Kies een vak</label>
            </div>
            <div class="col-75">
                <select id="course" name="course[]" multiple>
                    <option <?php if (isset($course) && $course == "Pro") echo "selected"; ?> value="Pro">Programmeren
                    </option>
                    <option <?php if (isset($course) && $course == "Webtech") echo "selected"; ?> value="Webtech">
                        Webtechnologie
                    </option>
                    <option <?php if (isset($course) && $course == "CMSIntro") echo "selected"; ?> value="CMSIntro">CMS
                        Intro
                    </option>
                    <option <?php if (isset($course) && $course == "CMSDev") echo "selected"; ?> value="CMSDev">CMS
                        Development
                    </option>
                    <option <?php if (isset($course) && $course == "OO") echo "selected"; ?> value="OO">OO
                        Programmeren
                    </option>
                </select>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-25">
            <input type="submit" value="Verzenden">
        </div>
    </div>

</form>
<script src="./script/script.js">
</script>

</body>

</html>