<?php

require_once __DIR__."/../vendor/autoload.php";

use App\UseCase\PartialSum;
use App\UseCase\RecurrenceFormula;


/* $instance = new RecurrenceFormula; */
/* $result = $instance->dynamicPlanFrog(5, [8, 6, 9, 2, 1]); */

/* var_dump($result); */

$N = 40;
$S = 200;
$aList = [
    1, 3, 55, 23, 45, 5, 6, 33, 61, 10,
    21, 9, 36, 67, 31, 11, 12, 46, 21, 8,
    99, 94, 23, 46, 43, 67, 98, 20, 85, 54,
    95, 56, 64, 60, 89, 81, 91, 83, 87, 44
];

$instance2 = new PartialSum;
echo (string)$instance2->dynamicPlanPartialSum($N, $S, $aList);
