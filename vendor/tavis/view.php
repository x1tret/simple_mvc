<?php

class View
{
    protected $extension = '';

    public function __construct()
    {
        $this->extension = Config::get('view_extension');
    }

    public static function render($view, $data = [])
    {
        $ext = self::getExtension();
        $path = DOC_ROOT."/view/$view.$ext";
        if ( ! file_exists($path))
            throw new Exception('View not found');

        return [$view, $data];
    }

    public static function getExtension()
    {
        return Config::get('view_extension');
    }
}