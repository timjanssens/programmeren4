<?php
namespace Sort;
include 'bead.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Showing the namespace on screen: <?php echo __NAMESPACE__ ?> </h2>

<h3>showing solution using one static method</h3>
<?php
bead::showAllThroughStaticMethod();
?>

<h3>showing solution using OOP</h3>

<?php
$bead = new bead(array(10, 5, 3, 8, 20, 7, 4, 1, 3, 12, 14, 6, 4, 1, 1));
?>

<ol>
    <li>
        <p>Numbers: </p>
        <?php echo $bead->echoArray(); ?>
    </li>
    <li>
        <p>Sample Abacus: </p>
        <?php
        $bead->numbersToAbacus();
        $bead->echoAbacus();
        ?>
    </li>
    <li>
        <p>Rotate Abacus: </p>
        <?php
        $bead->rotateAbacus();
        $bead->echoAbacus();?>
    </li>
    <li>
        <p>Gravitate Abacus: </p>
        <?php
        $bead->gravitateAbacus();
        $bead->echoAbacus();
        ?>
    </li>
    <li>
        <p>Rotate Abacus back: </p>
        <?php
        $bead->rotateAbacus();
        $bead->echoAbacus();
        ?>
    </li>
    <li>
        <p>Abacus to numbers: </p>
        <?php
        $bead->abacusToNumbers();
        $bead->echoArray();
        ?>
    </li>
</ol>

</body>
</html>

