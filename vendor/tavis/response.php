<?php

/**
 * @todo parse $view to html instead of using "include"
 **/
class Response
{
    protected $view;
    protected $data;

    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function renderHtml($is_escape = true)
    {
        $ext = View::getExtension();
        $vdata = $this->data;
        if ($this->view)
            $vcontent = DOC_ROOT . "/view/{$this->view}.$ext";
        include_once DOC_ROOT . "/view/template.$ext";
    }

    public function send($type = 'html')
    {
        switch ($type) {
            case 'json': break;
            default: echo $this->renderHtml();
        }
    }
}