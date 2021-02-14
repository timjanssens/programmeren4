<?php

function array01()
{
    $color = array('white', 'green', 'red', 'blue', 'black');

    echo "The memory of that scene for me is like a frame of film forever frozen at that moment: 
    the $color[2] carpet, the $color[1] lawn,the $color[0] house, the leaden sky.
    The new president and his first lady. - Richard M. Nixon";

}

function array02()
{
    $color = array('white', 'green', 'red');
    foreach ($color as $item) {
        echo "$item , ";
    }

    echo "<ul>";
    echo '<li>';
    echo $color[1] . '</li>';
    echo '<li>';
    echo $color[2] . '</li>';
    echo '<li>';
    echo $color[0] . '</li>';
    echo "</ul>";

    //voorbeeld online sorteerde eerst en drukte dan af met foreach
}

function array03()
{
    $ceu = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels",
        "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris",
        "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin",
        "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam",
        "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm",
        "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius",
        "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest",
        "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw");

    asort($ceu);

    foreach ($ceu as $key => $value) {
        echo 'The capital of ' . $key . ' is ' . $value . '<br>';
        //    or echo "The capital of $key is $value"."\n" ;
    }

}

function array04()
{

    $x = array(1, 2, 3, 4, 5);
    var_dump($x);
    echo "<br>";


    unset($x[3]);
    $x = array_values($x);
    var_dump($x);
}

function array05()
{

    $color = array(4 => 'white', 6 => 'green', 11 => 'red');
    echo array_values($color)[0];

}

function array06()
{
    $jsonObj = '{"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail":
    {
    "Publisher": "Little Brown"
}}';

    var_dump($jsonObj);
    echo "<br>";

    $jsonArray = json_decode($jsonObj, true);

    var_dump($jsonArray);

    foreach ($jsonArray as $key => $value) {
        echo $key . ":" . $value;
    }
}


function array07()
{
    $originalArray = array(1, 2, 3, 4, 5);

    echo "Original array <br>";

    foreach ($originalArray as $number) {
        echo "$number ";
    }

    echo "<br>";

    $insert = '$';

    array_splice($originalArray, 3, 0, $insert);

    echo "After inserting '$' the array is: <br>";
    foreach ($originalArray as $number) {
        echo "$number ";
    }
}

function array08()
{
    $persons = array("Sophia" => "31", "Jacob" => "41", "William" => "39", "Ramesh" => "40");

    asort($persons);

    foreach ($persons as $name => $age) {
        echo "$name : $age <br>";
    }
    echo "<br>";

    ksort($persons);

    foreach ($persons as $name => $age) {
        echo "$name : $age <br>";
    }
    echo "<br>";

    arsort($persons);

    foreach ($persons as $name => $age) {
        echo "$name : $age <br>";
    }
    echo "<br>";


    krsort($persons);

    foreach ($persons as $name => $age) {
        echo "$name : $age <br>";
    }
    echo "<br>";
}

function array09()
{
    $recordedTemperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,
        68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73);

    echo "Average Temperature is: " . round(array_sum($recordedTemperatures) / count($recordedTemperatures), 1) . "<br>";


    sort($recordedTemperatures);
    echo "List of five lowest temperatures: ";
    for ($i = 0; $i < 5; $i++) {
        echo "$recordedTemperatures[$i], ";
    }
    echo '<br>';

    rsort($recordedTemperatures);
    echo "List of five highest temperatures: ";
    for ($i = 0; $i < 5; $i++) {
        echo "$recordedTemperatures[$i], ";
    }
    echo '<br>';
}

function array10()
{
    echo "nog te doen - te moeilijk";
}

function array11()
{
    echo "nog te doen - te moeilijk";
}

function array12()
{

    $Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');


    echo "Values are in lower case.<br>";
    $Color = array_flip($Color);
    $Color = array_change_key_case($Color, 0);
    $Color = array_flip($Color);
    print_r($Color);

    echo "Values are in upper case.<br>";
    $Color = array_flip($Color);
    $Color = array_change_key_case($Color, 1);
    $Color = array_flip($Color);
    print_r($Color);
}

function array13()
{
    for ($i = 200; $i <= 250; $i++) {
        if ($i % 4 == 0) {
            echo "$i, ";
        }
    }
// echo implode(",",range(200,250,4))."\n"; oplossing W3
}

function array14()
{


    $characters = array("abcd", "abc", "de", "hjjj", "g", "wer");
    $smallest = strlen($characters[0]);
    $biggest = 0;

//find the smallest amount of chars in value in array
    foreach ($characters as $value) {
        if ($smallest > strlen($value)) {
            $smallest = strlen($value);
        }
    }


//find the biggest amount of chars in value in array
    foreach ($characters as $value) {
        if ($biggest < strlen($value)) {
            $biggest = strlen($value);
        }
    }

    echo "The shortest array length is $smallest. The longest array length is $biggest.";
}

