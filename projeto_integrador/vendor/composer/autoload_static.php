<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb49c581a296cec09077a772adfdb0fd1
{
    public static $files = array (
        '09fbbcc88888c03d4ed4fe339d47711f' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb49c581a296cec09077a772adfdb0fd1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb49c581a296cec09077a772adfdb0fd1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb49c581a296cec09077a772adfdb0fd1::$classMap;

        }, null, ClassLoader::class);
    }
}
