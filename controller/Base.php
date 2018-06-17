<?php

class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        if ( ! $this->isWhiteList($request))
            die('Access denied');
    }
}