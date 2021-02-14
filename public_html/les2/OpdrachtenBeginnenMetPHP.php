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

function array04(){

$x = array(1, 2, 3, 4, 5);
var_dump($x);
echo "<br>";


unset($x[3]);
$x = array_values($x);
var_dump($x);
}

//function array05(){

$color = array(4 => 'white', 6 => 'green', 11=> 'red');
echo array_values($color)[0];

//}