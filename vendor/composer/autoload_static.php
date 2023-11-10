<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff6e5f07fac2d5aa1966d04a878ff667
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitff6e5f07fac2d5aa1966d04a878ff667::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff6e5f07fac2d5aa1966d04a878ff667::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitff6e5f07fac2d5aa1966d04a878ff667::$classMap;

        }, null, ClassLoader::class);
    }
}