<?php


namespace FricFrac\Controllers;


class AdminController
{
    public function index()
    {
        $model = array('title' => 'Admin Index');
        return $this->view($model);
    }

}