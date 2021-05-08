<?php


namespace FricFrac\Controllers;


class EventController extends \ThreepennyMVC\Controller
{
    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {

        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['listEventCategory'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['listEventTopic'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne()
    {
        $model = array(
            'tableName' => 'Event',
            'error' => 'Geen'
        );
        $Event = array(
            "Name" => $_POST['Name'],
            "Location" => $_POST['Location'],
            "Starts" => $_POST['Starts'],
            "Ends" => $_POST['Ends'],
            "Image" => $_POST['Image'],
            "Description" => $_POST['Description'],
            "OrganiserName" => $_POST['OrganiserName'],
            "OrganiserDescription" => $_POST['OrganiserDescription'],
            "EventCategoryId" => $_POST['EventCategoryId'],
            "EventTopicId" => $_POST['EventTopicId']
        );
        if (\AnOrmApart\Dal::create('Event', $Event, 'Name')) {
            $model['message'] = "Rij toegevoegd! {$Event['Name']} is toegevoegd aan Event";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {$Event['Name']} niet toevoegen aan Event";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        return $this->view($model, 'Views/Event/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Event', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['listEventCategory'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['listEventTopic'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function deleteOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::delete('Event', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Event/Index.php');
    }

    public function updateOne($Id)
    {
        $row = array(
            "Id" => $_POST['Id'],
            "Name" => $_POST['Name'],
            "Starts" => $_POST['Starts'],
            "Ends" => $_POST['Ends'],
            "Image" => $_POST['Image'],
            "Description" => $_POST['Description'],
            "OrganiserName" => $_POST['OrganiserName'],
            "OrganiserDescription" => $_POST['OrganiserDescription'],
            "EventCategoryId" => $_POST['EventCategoryId'],
            "EventTopicId" => $_POST['EventTopicId']
        );

        $model['row'] = \AnOrmApart\Dal::update('Event', $row, "Name");
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Event/Index.php');
    }

    public function updatingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Event', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Event');
        $model['listEventCategory'] = \AnOrmApart\Dal::readAll('EventCategory');
        $model['listEventTopic'] = \AnOrmApart\Dal::readAll('EventTopic');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Event/UpdatingOne.php');
    }


}