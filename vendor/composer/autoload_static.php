<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit87f9cdc3eef81bb497cad1fe1758f193
{
    public static $files = array (
        '2e12f5296e8d7f030fb17728ea72fe76' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Library\\System\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Library\\System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit87f9cdc3eef81bb497cad1fe1758f193::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit87f9cdc3eef81bb497cad1fe1758f193::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit87f9cdc3eef81bb497cad1fe1758f193::$classMap;

        }, null, ClassLoader::class);
    }
}
