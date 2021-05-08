<?php


namespace FricFrac\Controllers;


class EventController extends \ThreepennyMVC\Controller
{
    public function index()
    {
        $model = array(
            'tableName' => 'Event',
            'error' => 'Alles is prima verlopen',
            'row' => array(
                'Name' => '',
                'Location' => '',
                'StartDate' => '',
                'StartTime' => '',
                'EndDate' => '',
                'EndTime' => '',
                'Image' => '',
                'Description' => '',
                'OrganiserName' => '',
                'OrganiserDescription' => '',
                'EventCategoryId' => null,
                'EventTopicId' => null,
                'ListEventCategory' => null,
                'ListEventTopic' => null
            ),
            'list' => array(
                array('Id' => 1, 'Name' => 'PHP serieus', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Bob Dylan in café De Kat', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Boekvoorstelling Klaartje Schrijvers', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Javacscript serieus', 'Location' => 'Antwerpen')
            )
        );
        return $this->view($model);
    }

    public function updatingOne()
    {
        $model = array(
            'tableName' => 'Event',
            'error' => 'Geen',
            'row' => array(
                'Name' => 'PHP serieus',
                'Location' => 'Antwerpen',
                'Starts' => '2020-10-10 20:00',
                'Ends' => '2020-10-11 22:00',
                'Image' => 'images/php-serieus.png',
                'Description' => 'Leren werken met ThreepennyMVC',
                'OrganiserName' => 'Modern Ways',
                'OrganiserDescription' => 'Teaching material',
                'EventCategoryId' => 3,
                'EventTopicId' => 4
            ),
            'listEventCategory' => array(
                array('Id' => 1, 'Name' => 'Appearance or Signing'),
                array('Id' => 2, 'Name' => 'Attraction Camp.'),
                array('Id' => 3, 'Name' => 'Trip or Retreat'),
                array('Id' => 4, 'Name' => 'Concert or Performance'),
                array('Id' => 5, 'Name' => 'Course, Training or Workshop')
            ),
            'listEventTopic' => array(
                array('Id' => 1, 'Name' => 'Auto, Boat & Air'),
                array('Id' => 2, 'Name' => 'Business & Professional'),
                array('Id' => 3, 'Name' => 'Charities & Causes'),
                array('Id' => 4, 'Name' => 'Community & Culture'),
                array('Id' => 5, 'Name' => 'Family & Education')
            ),
            'list' => array(
                array('Id' => 1, 'Name' => 'PHP serieus', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Bob Dylan in café De Kat', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Boekvoorstelling Klaartje Schrijvers', 'Location' => 'Antwerpen'),
                array('Id' => 1, 'Name' => 'Javacscript serieus', 'Location' => 'Antwerpen')
            )
        );
        return $this->view($model);
    }
}