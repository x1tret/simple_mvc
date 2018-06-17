<?php

class IndexController extends Controller
{
    public function indexAction()
    {
        $result = BannerModel::getActive();
        return View::render('index/index', ['result'  => $result]);
    }
}