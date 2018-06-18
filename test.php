<?php

define('DOC_ROOT',  dirname(__FILE__));
define('APP_ENV', 'testing');

include_once 'bootstrap.php';

Bootstrap::autoload();
Bootstrap::loadTest();
Bootstrap::run();

$ref = new ReflectionClass('BannerTest');
$arr_func = $ref->getMethods();
$testcases = [];
foreach ($arr_func as $item) {
    if($item->class == 'BannerTest')
        $testcases[] = $item->name;
}

$obj = new BannerTest();
foreach ($testcases as $func)
    $obj->$func();

$obj->printResult();