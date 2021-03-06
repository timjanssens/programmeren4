<?php
require 'vendor/autoload.php';
use ThreepennyMVC\FrontController;
//include('../vendor/threepennymvc/FrontController.php');
//include('../vendor/threepennymvc/Controller.php');
//include('../vendor/anormapart/Dal.php');
//include('../vendor/anormapart/Helpers.php');
include ('Controllers/AdminController.php');
include ('Controllers/EventController.php');
include ('Controllers/EventCategoryController.php');
include ('Controllers/EventTopicController.php');
include ('Controllers/PersonController.php');
include ('Controllers/RoleController.php');
include ('Controllers/UserController.php');
$route = FrontController::getRouteData($_SERVER['REQUEST_URI'], 'Fricfrac', 'Admin', 'index');
$view = FrontController::dispatch($route);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/icon-font.css">
    <title>Fric-frac events</title>
</head>
<body class="page">
<header class="page-header">
    <nav class="control-panel">
        <a href="/Admin/index" class="tile">
            <span class="icon-menu"></span>
            <span class="screen-reader-text">Admin index</span>
        </a>
    </nav>
    <h1 class="banner">Fric-frac</h1>
</header>
<?php echo $view();?>
<footer class="page-footer">
    <p>&copy Tim Janssens</p>
    <p>Opdracht Programmeren 4</p>
</footer>
</body>
</html>