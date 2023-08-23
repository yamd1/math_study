<?php

namespace App\UseCase;

class RecurrenceFormula
{
    function __construct()
    {
    }

    public function dynamicPlan(int $N, array $iList)
    {
        $dp = [];
        for ($i = 0; $i < $N; $i ++)
        {
            if ($i == 0) $dp[$i] = 0;
            if ($i == 1) $dp[$i] = abs($iList[$i - 1] - $iList[$i]);
            if ($i >= 2){ 
                $v1 = $dp[$i - 1] + abs($iList[$i - 1] - $iList[$i]);
                $v2 = $dp[$i - 2] + abs($iList[$i - 2] - $iList[$i]);
                $dp[$i] = min($v1, $v2);
            }
        }

        return $dp;
    }
}
