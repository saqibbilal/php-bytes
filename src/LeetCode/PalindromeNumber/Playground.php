<?php
return function ($solver) {
    $val = 121;

    return [
        'input'  => "x = $val",
        'result' => $solver->solve($val)
    ];
};