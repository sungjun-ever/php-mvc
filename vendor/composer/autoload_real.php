<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit93ec8af611d7c2f4c106988cb6fa13db
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit93ec8af611d7c2f4c106988cb6fa13db', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit93ec8af611d7c2f4c106988cb6fa13db', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit93ec8af611d7c2f4c106988cb6fa13db::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
