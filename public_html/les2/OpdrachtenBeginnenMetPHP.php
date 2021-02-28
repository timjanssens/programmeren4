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

function array06() //nog aan te passen
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
        if (is_array($value)) {
            foreach ($value as $subKey => $subValue) {
                echo $subKey . ":" . $subValue . "</br>";
            }
        } else {
            echo $key . ":" . $value . "</br>";

        }
    }

    //werken met recursie => betere oplossing want hier kunnen meerdere arrays in arrays zitten
    function echoArrayRecursiveWithKey($array)
    {
        foreach ($array as $key => $value) {
            //If $value is an array.
            if (is_array($value)) {
                //We need to loop through it.
                echoArrayRecursiveWithKey($value);
            } else {
                //It is not an array, so print it out.
                echo "$key: $value <br>";
            }
        }
    }

    echoArrayRecursiveWithKey($jsonArray);

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




    function numbersToAbacus($numbers)
    {
        $maxNumber = max($numbers);
        // $row = str_repeat('_', $maxNumber);
        $abacus = array();
        foreach ($numbers as $number) {
            $abacus[] = str_repeat('*', $number) . str_repeat('_', $maxNumber - $number);
        }
        return $abacus;
    }

    function rotateAbacus($abacus)
    {
        $rotatedAbacus = array_fill(0, strlen($abacus[0]), str_repeat('=', count($abacus) - 1,));
        for ($i = 0; $i < count($abacus); $i++) {
            for ($j = 0; $j < strlen($abacus[$i]); $j++) {
                $rotatedAbacus[$j][$i] = $abacus[$i][$j];
            }
        }
        // var_dump($rotatedAbacus);
        return $rotatedAbacus;
    }

    function gravitateAbacus($abacus)
    {
        $maxNumber = strlen($abacus[0]);
        for ($i = 0; $i < count($abacus); $i++) {
            $number = substr_count($abacus[$i], '*');
            $abacus[$i] = str_repeat('*', $number) . str_repeat('_', $maxNumber - $number);
        }
        return $abacus;
    }

    function abacusToNumbers($abacus)
    {
        $numbers = array();
        for ($i = count($abacus) - 1; $i >= 0; $i--) {
            $number = substr_count($abacus[$i], '*');
            $numbers[] = $number;
        }
        return $numbers;
    }


    function echoArray($numbers)
    {
        foreach ($numbers as $number) {
            echo "$number<br/>";
        }
    }

    function echoAbacus($abacus)
    {
        foreach ($abacus as $row) {
            echo "$row<br/>";
        }
    }

    $sampleNumbers = array(10, 5, 3, 8, 20, 7, 4, 1, 3, 12, 14, 6, 4, 1, 1);
    $sampleAbacus = numbersToAbacus($sampleNumbers);
    $rotatedAbacus = rotateAbacus($sampleAbacus);
    $gravitatedAbacus = gravitateAbacus($rotatedAbacus);
    $rotatedBackAbacus = rotateAbacus($gravitatedAbacus);
    $sortedNumbers = abacusToNumbers($rotatedBackAbacus);

    echo echoArray($sampleNumbers);
    echo 'Sample Abacus' . '</br>';
    echo echoAbacus($sampleAbacus);
    echo 'Rotate abacus' . '</br>';
    echo echoAbacus($rotatedAbacus);
    echo 'Gravitate abacus' . '</br>';
    echo echoAbacus($gravitatedAbacus);
    echo 'RotatedBack abacus' . '</br>';
    echo echoAbacus($rotatedBackAbacus);
    echo 'Abacus to numbers' . '</br>';
    echo echoAbacus($sortedNumbers);

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


function array15()
{

    $numbers = range(11, 20);
    shuffle($numbers);
    foreach ($numbers as $value) {
        echo "$value ";
    }
}

function array16()
{
    $arr = array(1 => "A", 10 => "B", 5 => "C");
    echo max(array_keys($arr));
}

function array17(){
    $arr = array(0, 2, 3, 4, 0, 5, 6, 4, 3, 2, 0);


    $arr_filtered = array_filter($arr, "RemoveZero");

    function RemoveZero($arr)
    {
        return ($arr > 0);
    }

    echo min($arr_filtered);
}

function array18()
{
    function getNumber($number, $precision, $separator)
    {
//get precision
        $sol = number_format(floor($number * (pow(10, $precision))) / (pow(10, $precision)), $precision, $separator);
//choice seperator
//  $sol = number_format($sol, $precision,'$separator','');
        return $sol;
    }

    print_r(getNumber(1152.5556455, 4, ','));
    echo "<br>";
    print_r(getNumber(100.25781, 4, '.'));
    echo "<br>";
    print_r(getNumber(-2.9636, 3, ':'));
}

function array19()
{

}

function for_loop01()
{

    for ($i = 1; $i <= 10; $i++) {
        if ($i < 10) {
            echo "$i - ";
        } else {
            echo "$i";
        }
    }
}


function for_loop02()
{

    $sum = 0;

    for ($i = 0; $i <= 30; $i++) {
        $sum += $i;
    }

    echo $sum;
}


