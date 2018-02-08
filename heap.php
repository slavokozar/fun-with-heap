<?php
function heapInsert($heap, $value){
    $index = count($heap) + 1;

    while ($index > 1 && $value > $heap[intval($index / 2) - 1]) { //dokud je nas prvek mensi nez jeho otec
        $heap[$index - 1] = $heap[intval($index / 2) - 1]; //pak otce posuneme o uroven niz (cimz se nam mezera na vlozeni posune o patro)

        $index = intval( $index / 2);
    }
    $heap[$index - 1] = $value; //o patro vys je jiz prvek nizsi, proto vlozime prvek prave sem, vlastnost haldy byla obnovena
    return $heap;
}


function heapToString($heap){
    $heapSize = count($heap);

    $row = 1;

    $rows = ceil(log2($heapSize + 1));

    $rowCount = 0;
    $i = 0;

    $rowLength = 1;
    while($i < $heapSize){

        /*
         * kolko clenov mam v lavom podstrome?
         * (2 ^ hlbka_podstromu - 1) * 2
         */
        echo formatSpace((pow(2, ($rows - $row)) - 1) * 2);
        echo formatNumber($heap[$i]);
        echo formatSpace((pow(2, ($rows - $row)) - 1) * 2 + 2);

        $rowCount++;
        if($rowCount == $rowLength){
            $rowCount = 0;

            echo '<br>';
            $row++;
            $rowLength *= 2;
        }
        $i++;
    }

    for($i = 0; $i < (($rowLength - $rowCount) * 4); $i++){
        echo '&nbsp;';
    }
}


function formatNumber($i){
    if($i < 10){
        return '&nbsp;' . $i;
    }
    return $i;
}

function formatSpace($size){
    $space = '';
    for($i = 0; $i < $size; $i++){
        $space .= '&nbsp;';
    }
    return $space;
}


function log2($x){
    return (log($x) / log(2));
}