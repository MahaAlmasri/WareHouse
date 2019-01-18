<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0c07d45874e92c93087a85f7162b046
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Groenteboer\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Groenteboer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Groenteboer\\DataModel' => __DIR__ . '/../..' . '/src/DataModel.php',
        'Groenteboer\\OrderModel' => __DIR__ . '/../..' . '/src/OrderModel.php',
        'Groenteboer\\ProductModel' => __DIR__ . '/../..' . '/src/ProductModel.php',
        'Groenteboer\\ProductView' => __DIR__ . '/../..' . '/src/ProductView.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0c07d45874e92c93087a85f7162b046::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0c07d45874e92c93087a85f7162b046::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0c07d45874e92c93087a85f7162b046::$classMap;

        }, null, ClassLoader::class);
    }
}
