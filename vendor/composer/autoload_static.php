<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48a86a19a7f162a80bd72a2b29a7b8f3
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'View\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/templating',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Comment' => __DIR__ . '/../..' . '/src/Comment.php',
        'App\\Config' => __DIR__ . '/../..' . '/src/Config.php',
        'App\\Database' => __DIR__ . '/../..' . '/src/Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48a86a19a7f162a80bd72a2b29a7b8f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48a86a19a7f162a80bd72a2b29a7b8f3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48a86a19a7f162a80bd72a2b29a7b8f3::$classMap;

        }, null, ClassLoader::class);
    }
}
