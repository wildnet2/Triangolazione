<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab67199aa5d97c2c07a92be5a72c3f75
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pusher\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pusher\\' => 
        array (
            0 => __DIR__ . '/..' . '/pusher/pusher-php-server/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitab67199aa5d97c2c07a92be5a72c3f75::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitab67199aa5d97c2c07a92be5a72c3f75::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
