<?php


namespace FricFrac\Controllers;


class UserController extends \ThreepennyMVC\Controller
{
    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['listPerson'] = \AnOrmApart\Dal::readAll('Person', 'LastName',);
        $model['listRole'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne()
    {
        $model = array(
            'tableName' => 'User',
            'error' => 'Geen'
        );
        $User = array(
            "Name" => $_POST['Name'],
            "Salt" => $_POST['Salt'],
            "HashedPassword" => $_POST['HashedPassword'],
            "PersonId" => $_POST['PersonId'],
            "RoleId" => $_POST['RoleId']
        );

        if (\AnOrmApart\Dal::create('User', $User, 'Name')) {
            $model['message'] = "Rij toegevoegd! {User['Name']} is toegevoegd aan User";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {User['Name']} niet toevoegen aan User";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        return $this->view($model, 'Views/User/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('User', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['listPerson'] = \AnOrmApart\Dal::readAll('Person', 'LastName',);
        $model['listRole'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function deleteOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::delete('User', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/User/Index.php');
    }

    public function updateOne($Id)
    {
        $row = array(
            "Id" => $_POST['Id'],
            "Name" => $_POST['Name'],
            "Salt" => $_POST['Salt'],
            "HashedPassword" => $_POST['HashedPassword'],
            "PersonId" => $_POST['PersonId'],
            "RoleId" => $_POST['RoleId']
        );

        $model['row'] = \AnOrmApart\Dal::update('User', $row, "Name");
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/User/Index.php');
    }

    public function updatingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('User', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('User');
        $model['listPerson'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['listRole'] = \AnOrmApart\Dal::readAll('Role');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/User/UpdatingOne.php');
    }
}