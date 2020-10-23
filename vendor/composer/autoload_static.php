<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit85dfdb6f1bbba52ef99875ebd1e0f1b9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit85dfdb6f1bbba52ef99875ebd1e0f1b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit85dfdb6f1bbba52ef99875ebd1e0f1b9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}