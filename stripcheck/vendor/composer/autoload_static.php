<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff0006ae01ce9dc5b4302e04f7a6732c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitff0006ae01ce9dc5b4302e04f7a6732c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff0006ae01ce9dc5b4302e04f7a6732c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitff0006ae01ce9dc5b4302e04f7a6732c::$classMap;

        }, null, ClassLoader::class);
    }
}
