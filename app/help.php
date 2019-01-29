<?php

function objCountArray($objs){
    $countArr = [];
    foreach($objs as $obj){
        $pushCount = $obj->tasks->count();
        array_push($countArr,$pushCount);
    }
    return $countArr;
}
?>