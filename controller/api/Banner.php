<?php

class BannerApiController extends ApiController
{
    public function indexAction()
    {
        if (Util::isWhiteList($this->request->addr))
            $result = BannerModel::getAll();
        else
            $result = BannerModel::getActive();

        return View::encode($result);
    }
}