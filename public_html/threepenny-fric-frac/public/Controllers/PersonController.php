<?php


namespace FricFrac\Controllers;


class PersonController extends \ThreepennyMVC\Controller
{

    public function index()
    {
        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function insertingOne()
    {

        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['listCountry'] = \AnOrmApart\Dal::readAll('Country');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }

    public function createOne()
    {
        $model = array(
            'tableName' => 'Person',
            'error' => 'Geen'
        );
        $Person = array(
            "FirstName" => $_POST['FirstName'],
            "LastName" => $_POST['LastName'],
            "Email" => $_POST['Email'],
            "Address1" => $_POST['Address1'],
            "Address2" => $_POST['Address2'],
            "PostalCode" => $_POST['PostalCode'],
            "City" => $_POST['City'],
            "CountryId" => $_POST['CountryId'],
            "Phone1" => $_POST['Phone1'],
            "Birthday" => $_POST['Birthday'],
            "Rating" => $_POST['Rating']
        );

        if (\AnOrmApart\Dal::create('Person', $Person, 'LastName')) {
            $model['message'] = "Rij toegevoegd! {$Person['FirstName']} is toegevoegd aan Person";
        } else {
            $model['message'] = "Oeps er is iets fout gelopen! Kan {$Person['FirstName']} niet toevoegen aan Person";
            $model['error'] = \AnOrmApart\Dal::getMessage();
        }
        $model['list'] = \AnOrmApart\Dal::readAll('Person', "LastName");
        return $this->view($model, 'Views/Person/Index.php');
    }

    public function readingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Person', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['listCountry'] = \AnOrmApart\Dal::readAll('Country');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model);
    }
    public function deleteOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::delete('Person', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['listCountry'] = \AnOrmApart\Dal::readAll('Country');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Person/Index.php');
    }

    public function updateOne($Id)
    {
        $row = array(
            "Id" => $_POST['Id'],
            "FirstName" => $_POST['FirstName'],
            "LastName" => $_POST['LastName'],
            "Email" => $_POST['Email'],
            "Address1" => $_POST['Address1'],
            "Address2" => $_POST['Address2'],
            "PostalCode" => $_POST['PostalCode'],
            "City" => $_POST['City'],
            "CountryId" => $_POST['CountryId'],
            "Phone1" => $_POST['Phone1'],
            "Birthday" => $_POST['Birthday'],
            "Rating" => $_POST['Rating']
        );


        $model['row'] = \AnOrmApart\Dal::update('Person',$row, "LastName");
        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Person/Index.php' );
    }

    public function updatingOne($Id)
    {
        $model['row'] = \AnOrmApart\Dal::readOne('Person', $Id);
        $model['list'] = \AnOrmApart\Dal::readAll('Person', 'LastName');
        $model['listCountry'] = \AnOrmApart\Dal::readAll('Country');
        $model['message'] = \AnOrmApart\Dal::getMessage();
        return $this->view($model, 'Views/Person/UpdatingOne.php' );
    }





}