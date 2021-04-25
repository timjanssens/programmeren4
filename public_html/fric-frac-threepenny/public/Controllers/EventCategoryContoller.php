<?php


namespace FricFrac\Controllers;


class EventCategoryContoller extends \ThreepennyMVC\Controller
{
    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne()
    {
        $model = array(
            'tableName' => 'EventCategory',
            'error' => 'Geen'
        );
        $eventCategory = array(
            "Name" => $_POST['Name']
        );

        if (\AnOrmApart\Dal::create('EventCategory', $eventCategory, 'Name')) {
            $model['message'] = "Rij toegevoegd! {$eventCategory['Name']} is toegevoegd aan EventCategory";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {$eventCategory['Name']} niet toevoegen aan EventCategory";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('EventCategory');
        return $this->view($model, 'Views/EventCategory/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('EventCategory', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

}