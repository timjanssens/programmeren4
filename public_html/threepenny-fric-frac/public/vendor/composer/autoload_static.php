<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1bf9190b72bcf8659fe29c88ef05253
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'ThreepennyMVC\\' => 14,
        ),
        'F' => 
        array (
            'FricFrac\\Controllers\\' => 21,
        ),
        'A' => 
        array (
            'AnOrmApart\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ThreepennyMVC\\' => 
        array (
            0 => __DIR__ . '/..' . '/threepennymvc',
        ),
        'FricFrac\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../Controllers',
        ),
        'AnOrmApart\\' => 
        array (
            0 => __DIR__ . '/..' . '/anormapart',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1bf9190b72bcf8659fe29c88ef05253::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1bf9190b72bcf8659fe29c88ef05253::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1bf9190b72bcf8659fe29c88ef05253::$classMap;

        }, null, ClassLoader::class);
    }
}
