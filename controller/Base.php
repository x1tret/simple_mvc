<?php

class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        if ( ! Util::isWhiteList($request->addr))
            die('Access denied');
    }
}