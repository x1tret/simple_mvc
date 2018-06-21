<?php

/**
 * @todo parse $view to html instead of using "include"
 **/
class Response
{
    protected static $type;
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public static function setOption($opts)
    {
        self::$type = isset($opts['type']) ? $opts['type'] : 'html';
    }

    public function renderHtml($is_escape = true)
    {
        $ext = View::getExtension();
        $vcontent = $this->content;
        include_once DOC_ROOT . "/view/template.$ext";
    }

    public function renderJson($is_escape = true)
    {
        header('Content-type: application/json');
        return $this->content;
    }

    public function send()
    {
        switch (self::$type) {
            case 'json': echo $this->renderJson(); break;
            default: echo $this->renderHtml();
        }
    }
}