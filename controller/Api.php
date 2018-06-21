<?php
class ApiController extends Controller
{
    public function __construct(Request $request)
    {
        Response::setOption(['type' => 'json']);
        return parent::__construct($request);
    }
}