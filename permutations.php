<?php
require('heap.php');


$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$numbersCount = count($numbers);

$matches = 0;

permutations();

echo $matches;



function permutations($permutation = []){
    global $numbers, $numbersCount;

    if(count($permutation) == 9){

        testPermutation($permutation);
    }else{
        for($i = 0; $i < $numbersCount; $i++){

            if(in_array($numbers[$i], $permutation)) continue;
            $tmp = $permutation;
            $tmp[] = $numbers[$i];

            permutations($tmp);
        }
    }
}

function testPermutation($permutation){
    global $matches;

    $pattern = [9, 7, 8, 6, 4, 2, 3, 1, 5];

    $permutationCount = count($permutation);
    $heap = [];
    for($i = 0; $i < $permutationCount; $i++){
        $heap = heapInsert($heap, $permutation[$i]);
    }

    if($heap === $pattern){
        echo '<pre style="background:#ddd">';
        printArray($permutation);
        heapToString($heap);
        echo '</pre>';
        echo '<hr>';

        $matches++;
    }
}

function printArray($array){
    $arrayCount = count($array);
    for($i = 0; $i < $arrayCount; $i++){
        if($i > 0) echo ' ';

        echo $array[$i];
    }
    echo '<br>';
}