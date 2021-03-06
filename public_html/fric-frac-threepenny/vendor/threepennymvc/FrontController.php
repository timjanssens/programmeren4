<?php


namespace ThreepennyMVC;


class FrontController

{
    public static function getRouteData($uri, $namespaceName = '\\',
                                        $controllerName = 'Home', $actionMethodName = 'index')
    {
        $controllerClassName =  "{$namespaceName}\\Controllers\\{$controllerName}Controller";
        $parameterValue = -1;
        $delimiter = '/';
        // remove last \ if present
        $namespaceName = rtrim($namespaceName, '\\');
        // remove first /, if present
        $uri = ltrim($uri, $delimiter);
        // make sure there is always a last /
        $uri = $uri . $delimiter;
        // remove last /, if present
        // $uri = rtrim($uri, $delimiter);
        $pos1 = strpos($uri, $delimiter);
        if ($pos1 > 0) {
            // klassenamen in PHP beginnen met een hoofdletter, pascalnotatie
            $controllerClassName = $namespaceName . '\\Controllers\\' .
                ucfirst(substr($uri, 0, $pos1)) . 'Controller';
            $pos2 = strpos($uri, $delimiter, $pos1 + 1);
            // echo 'pos2: ' . $pos2 . 'pos 1' . $pos1;
            if ($pos2 > 0) {
                // functies in camelcase notatie
                // echo $uri;
                $actionMethodName = lcfirst(substr($uri, $pos1 + 1, $pos2 - $pos1 - 1));
                // echo self::$actionMethodName;
                if ($pos2 < strlen($uri)) {
                    //echo 'pos3: ' . $pos3;
                    $pos3 = strpos($uri, $delimiter, $pos2);
                    if ($pos3 > 0) {
                        $parameterValue = rtrim(substr($uri, $pos3 + 1), '/');
                    }
                    if (empty($parameterValue)) {
                        $parameterValue = -1;
                    }
                }
            }
        }
        return array(
            'controllerClassName' => $controllerClassName,
            'actionMethodName' => $actionMethodName,
            'parameterValue' => $parameterValue);
    }

    public static function dispatch($action)
    {
        // https://stackoverflow.com/questions/4646786/dynamic-lang-runtime-vs-reflection
        try {
            $reflection = new \ReflectionClass($action['controllerClassName']);
            try {
                $actionMethod = new \ReflectionMethod($action['controllerClassName'],
                    $action['actionMethodName']);
                $controller = $reflection->newInstance();
                return $actionMethod->invokeArgs($controller, array($action['parameterValue']));
            } catch (\ReflectionException $e) {
                $actionMethodName = $action['actionMethodName'];
                echo "Method $actionMethodName does not exist!";
                return false;
            }
        } catch (\ReflectionException $e) {
            $controllerClassName = $action['controllerClassName'];
            echo "Class $controllerClassName does not exist!";
            return false;
        }
    }
}