<?php
/**
 * Created by ModernWays
 * User: Jef Inghelbrecht
 * Date: 23/02/2020
 * Time: 10:32
 */

namespace ThreepennyMVC;

class Controller
{
    public function view($model = null, $path = null)
    {
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
            include($path);
        };
        return $view;
    }
}