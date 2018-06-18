<?php

class Util
{
    public static function isWhiteList($ip)
    {
        return in_array($ip, Config::get('white_list'));
    }
}