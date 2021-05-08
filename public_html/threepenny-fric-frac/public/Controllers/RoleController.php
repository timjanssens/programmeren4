<?php


namespace FricFrac\Controllers;


class RoleController extends \ThreepennyMVC\Controller
{

    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne()
    {
        $model = array(
            'tableName' => 'Role',
            'error' => 'Geen'
        );
        $Role = array(
            "Name" => $_POST['Name']
        );

        if (\AnOrmApart\Dal::create('Role', $Role, 'Name')) {
            $model['message'] = "Rij toegevoegd! {$Role['Name']} is toegevoegd aan Role";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {$Role['Name']} niet toevoegen aan Role";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        return $this->view($model, 'Views/Role/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Role', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function deleteOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::delete('Role', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Role/Index.php');
    }

    public function updateOne($Id)
    {
        $row = array(
            "Id" => $_POST['Id'],
            "Name" => $_POST['Name']
        );

        $model['row'] = \AnOrmApart\Dal::update('Role',$row, "Name");
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Role/Index.php' );
    }

    public function updatingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Role', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Role/UpdatingOne.php' );
    }
}