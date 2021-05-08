<?php


namespace FricFrac\Controllers;


class EventTopicController extends \ThreepennyMVC\Controller
{

    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne() {
        $model = array('tableName' => 'EventTopic',
            'error' => 'Geen error');
        $eventTopic = array (
            "Name" => $_POST['Name']);

        if (\AnOrmApart\Dal::create('EventTopic', $eventTopic, 'Name')) {
            $model['message'] = "Rij toegevoegd! {$eventTopic['Name']} is toegevoegd aan EventTopic";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {$eventTopic['Name']} niet toevoegen aan EventTopic";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        return $this->view($model, 'Views/EventTopic/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('EventTopic', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }
    public function deleteOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::delete('EventTopic', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/EventTopic/Index.php');
    }

    public function updateOne($Id)
    {
        $row = array(
            "Id" => $_POST['Id'],
            "Name" => $_POST['Name']
        );

        $model['row'] = \AnOrmApart\Dal::update('EventTopic',$row, "Name");
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/EventTopic/Index.php' );
    }

    public function updatingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('EventTopic', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/EventTopic/UpdatingOne.php' );
    }



}