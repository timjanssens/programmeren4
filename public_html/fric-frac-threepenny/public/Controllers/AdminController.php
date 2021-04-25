<?php


namespace FricFrac\Controllers;


class AdminController extends \ThreepennyMVC\Controller
{
    public function index()
    {
        $model = array('title' => 'Admin Index');
        return $this->view($model);
    }
}