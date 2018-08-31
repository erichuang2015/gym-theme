<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf8b139c5b4ec923f489b37a4928aa12
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostTypes\\' => 10,
        ),
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostTypes\\' => 
        array (
            0 => __DIR__ . '/..' . '/jjgrainger/posttypes/src',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf8b139c5b4ec923f489b37a4928aa12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf8b139c5b4ec923f489b37a4928aa12::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
