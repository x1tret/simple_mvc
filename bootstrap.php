<?php

/**
 * It's autoload of a simple framework which I just created for quick challenge.
 * https://github.com/x1tret/simple_mvc
 *
 * @todo autoload all files when they are called instead of loading as specify one at this moment.
 **/
class Bootstrap
{
    static $config;
    public static function autoload()
    {
        self::$config = include_once 'app.php';

        $arr_abs = [
            'vendor/tavis/controller.php',
            'controller/Base.php',
            'vendor/tavis/db.php',
            'model/Base.php',
        ];
        foreach ($arr_abs as $filename)
            include_once $filename;

        $arr = [
            '/vendor/tavis/*.php',
            '/controller/*.php',
            '/model/*.php',
            '/util/*.php',
        ];
        foreach ($arr as $dir) {
            $arr_files = glob(DOC_ROOT.$dir);
            foreach ($arr_files as $filename)
                include_once $filename;
        }
    }

    public static function run()
    {
        $timezone = Config::get('timezone');
        if ($timezone)
            date_default_timezone_set($timezone);
    }

    public static function loadTest()
    {
        $arr_files = glob(DOC_ROOT.'/test/*.php');
        foreach ($arr_files as $filename)
            include_once $filename;
    }
}

class Config
{
    static $arr_config;
    public static function get($name, $default = null)
    {
        $config = Bootstrap::$config;
        if (isset($config[$name]))
            return $config[$name];

        if (isset(self::$arr_config[$name]))
            return self::$arr_config[$name];

        $config_file = DOC_ROOT . "/config/$name.php";
        if (file_exists($config_file)) {
            $config = include_once $config_file;
            $arr_config[$name] = $config;
            return $config;
        }
    }
}