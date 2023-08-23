<?php

require_once __DIR__."/../vendor/autoload.php";

use App\UseCase\RecurrenceFormula;


$instance = new RecurrenceFormula;
$result = $instance->dynamicPlan(5, [8, 6, 9, 2, 1]);

var_dump($result);
