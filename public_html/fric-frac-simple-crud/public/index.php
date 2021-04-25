<?php
// var_dump($_SERVER);
use ThreepennyMVC\FrontController;
include_once('../vendor/threepennymvc/FrontController.php');
// default namespace is root \
// otherwise specify it as argument
$route = FrontController::getRouteData($_SERVER['REQUEST_URI'], 'Fricfrac', 'Admin', 'index');
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fric-frac events</title>
</head>

<body>
<h1>Route</h1>
<pre>
    <?php var_dump($route); ?>
    </pre>
<h1>Server</h1>
<pre>
    <?php var_dump($_SERVER); ?>
    </pre>
</body>

</html>