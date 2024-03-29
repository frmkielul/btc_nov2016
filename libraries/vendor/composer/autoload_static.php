<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc69ca637ebab6f9feca4deeeb61185d7
{
    public static $files = array (
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Resty\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'C' => 
        array (
            'Coinbase\\Wallet\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Resty\\' => 
        array (
            0 => __DIR__ . '/..' . '/resty/resty/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Coinbase\\Wallet\\' => 
        array (
            0 => __DIR__ . '/..' . '/coinbase/coinbase/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'A' => 
        array (
            'Authy' => 
            array (
                0 => __DIR__ . '/..' . '/authy/php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc69ca637ebab6f9feca4deeeb61185d7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc69ca637ebab6f9feca4deeeb61185d7::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitc69ca637ebab6f9feca4deeeb61185d7::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
