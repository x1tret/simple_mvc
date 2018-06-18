<?php

class IndexController extends Controller
{
    public function indexAction()
    {
        if (Util::isWhiteList($this->request->addr))
            $result = BannerModel::getAll();
        else
            $result = BannerModel::getActive();
        return View::render('index/index', ['result'  => $result]);
    }
}