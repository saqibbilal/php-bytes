<?php
// This file returns a closure that the viewer will execute
return function ($solver) {
    $nums = [2, 7, 11, 15];
    $target = 9;

    return [
        'input'  => "nums = " . json_encode($nums) . ", target = $target",
        'result' => $solver->solve($nums, $target)
    ];
};