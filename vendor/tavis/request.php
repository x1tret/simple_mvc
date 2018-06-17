<?php

class Request
{
    public $uri;
    public $host;
    public $addr;
    protected $controller;
    protected $action;
    protected $params;


    public function __construct()
    {
        $this->uri = isset($_REQUEST['q']) ? $_REQUEST['q'] : '/';
        $this->host = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'mercari.ductai.me';
        $this->addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }

    public function setProcessor($controller = null, $action = null, $params = null)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    public static function input($param = '')
    {
        $arr = $_REQUEST;
        unset($arr['q']);

        if ($param)
            return isset($arr[$param]) ? $arr[$param] : null;

        return $arr;
    }

    public function process()
    {
        $controller = new $this->controller($this);
        list($view, $data) = call_user_func_array([$controller, $this->action], $this->params);
        $response = new Response($view, $data);
        return $response;
    }

    public static function redirect($uri)
    {
        header('Location: ' . $uri);
        die;
    }
}