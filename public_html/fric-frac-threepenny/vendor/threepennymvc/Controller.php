<?php


namespace ThreepennyMVC;


class Controller
{
    public function view($model = null, $path = null)
    {
        // als het pad naar de view niet werd opgegeven en dus null is,
        // staat het in een submap met de naam Views/Index.php
        if (!isset($path)) {
            // zoals in ASP.NET gaan we er van uit dat
            // de view staat in een map met de naam
            // van de controller en dat het bestand
            // de naam heeft van de methode
            $folderName =  str_replace('Controller', '', (new \ReflectionClass($this))->getShortName());
            $fileName = ucfirst(debug_backtrace()[1]['function']);
            $path = 'Views' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $fileName . '.php';
        }
        $view = function () use ($model, $path) {
            // echo $path;
            include($path);
        };
        return $view;
    }

}