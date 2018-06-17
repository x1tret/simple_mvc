<?php

class Route
{
    public static function run($request)
    {
        $uri = $request->uri;

        if ($uri == '/') {
            list($controller, $action, $params) = ['IndexController', 'indexAction', []];
        } else {
            $dependency = self::getDependency($uri);
            if (count($dependency) < 2)
                die('Page cannot found');

            $controller = $dependency[0];
            $action = $dependency[1] . 'Action';
            $params = array_slice($dependency, 2);
        }

        $request->setProcessor($controller, $action, $params);
        return $request->process();
    }

    private static function getDependency($uri)
    {
        $routeConfig = Config::get('route');
        preg_match_all("/\/(\d+)+/", $uri, $matches);
        $uri = rtrim(preg_replace("/\/(\d+)+/", '', $uri), '/');

        $route = '';
        foreach ($routeConfig as $r => $item) {
            $tmp = preg_replace("/\/\{(.*?)\}/", '', $r);
            if ($tmp == $uri) {
                $route = $r;
                break;
            }
        }
        if ( ! $route)
            return null;

        $arr = explode('@', $routeConfig[$route]);
        $arr = array_merge($arr, $matches[1]);

        return $arr;
    }
}