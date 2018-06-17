<?php

class Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isPost()
    {
        return $this->method() == 'POST';
    }

    public function isWhiteList($request)
    {
        return in_array($request->addr, Config::get('white_list'));
    }
}