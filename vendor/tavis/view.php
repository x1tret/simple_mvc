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

        ob_start();
        $vdata = $data;
        include $path;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public static function encode($data = [], $encode = JSON_UNESCAPED_UNICODE)
    {
        return json_encode($data, $encode);
    }

    public static function getExtension()
    {
        return Config::get('view_extension');
    }
}