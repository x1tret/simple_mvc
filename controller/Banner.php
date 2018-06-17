<?php

class BannerController extends BaseController
{
    public function indexAction()
    {
        $result = BannerModel::getAll();
        return View::render('banner/index', ['result'  => $result]);
    }

    public function addAction()
    {
        $msg = [];
        if ($this->isPost()) {
            $data = Request::input();
            $valid = Validation::forge([
                'banner_name' => 'required',
                'url'         => 'required',
                'start_date'  => 'required|time',
                'end_date'    => 'required|time',
            ]);
            if ( ! $valid->check($data))
                return View::render('banner/add', ['error' => $valid->getError()]);

            $banner = new BannerModel();
            $banner->saveData($data);
            $msg['success'] = 'Saved banner successfully!';
        }

        return View::render('banner/add', $msg);
    }

    public function editAction($id)
    {
        $banner = BannerModel::getOne($id);
        if ( ! $banner)
            throw new Exception('Banner cannot be found');

        $view_data = ['banner' => $banner];
        if ($this->isPost()) {
            $data = Request::input();
            $valid = Validation::forge([
                'banner_name' => 'required',
                'url'         => 'required',
                'start_date'  => 'required|time',
                'end_date'    => 'required|time',
            ]);
            if ( ! $valid->check($data))
                return View::render('banner/add', ['error' => $valid->getError()]);

            $banner->saveData($data);
            $view_data['success'] = 'Saved banner successfully!';
        }

        return View::render('banner/edit', $view_data);
    }

}