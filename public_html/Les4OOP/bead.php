<?php
namespace Sort;


class bead
{

    public $numbers;
    public $abacus = array();

    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }


    public function echoArray()
    {
        foreach ($this->numbers as $number) {
            echo "$number<br/>";
        }
    }

  //  function to show abacus on screen
    public function echoAbacus()
    {
        foreach ($this->abacus as $row) {
            echo "$row<br/>";
        }
    }


    public function numbersToAbacus()
    {
        $maxNumber = max($this->numbers);
//        echo "$maxNumber<br/>"; //
        $row = str_repeat('_', $maxNumber);
//        echo "$row<br/>";  //
        $abacusHelper = array();
         foreach ($this->numbers as $number) {
         $abacusHelper[] =  str_repeat('*', $number) . str_repeat('_', $maxNumber - $number);
        }

//        var_dump($abacusHelper);
        $this->abacus = $abacusHelper;
//        var_dump($this->abacus);
    }

    function rotateAbacus()
    {
        $rotatedAbacus = array_fill(0, strlen($this->abacus[0]), str_repeat('=', count($this->abacus) - 1,));
        for ($i = 0; $i < count($this->abacus); $i++) {
            for ($j = 0; $j < strlen($this->abacus[$i]); $j++) {
                $rotatedAbacus[$j][$i] = $this->abacus[$i][$j];
            }
        }
  //       var_dump($rotatedAbacus);
        $this->abacus = $rotatedAbacus;
    }



    function gravitateAbacus()
    {
        $maxNumber = strlen($this->abacus[0]);
        for ($i = 0; $i < count($this->abacus); $i++) {
            $number = substr_count($this->abacus[$i], '*');
            $this->abacus[$i] = str_repeat('*', $number) . str_repeat('_', $maxNumber - $number);
        }

    }

    function abacusToNumbers()
    {
        $numbers = array();
        for ($i = count($this->abacus) - 1; $i >= 0; $i--) {
            $number = substr_count($this->abacus[$i], '*');
            $numbers[] = $number;
        }
        $this->numbers =  $numbers;
    }



//implemantation via statis method => no good implementation
    public static function showAllThroughStaticMethod()
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

//function to show abacus on screen
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


        echoArray($sampleNumbers);
        echoAbacus($sampleAbacus);
        echoAbacus($rotatedAbacus);
        echoAbacus($gravitatedAbacus);
        echoAbacus($rotatedBackAbacus);
        echoAbacus($sortedNumbers);
    }

}

?>
