<?php

namespace App\UseCase;

class PartialSum
{

    public function dynamicPlanPartialSum(int $N, int $S, array $aList): bool 
    {
        $dp = [];
        for ($i = 0; $i < $N; $i ++)
        {
            for ($j = 0; $j < $S; $j ++)
            {
                $dp[$i][$j] = 0;
                if ($i == 0) $dp[$i][$j] = isset($aList[$j]) ? $aList[$j] : 0;
                if ($i >= 1)
                {
                    if ($j < $aList[$i - 1]) $dp[$i][$j] = $dp[$i - 1][$j];
                    if ($j >= $aList[$i - 1])
                    {
                        $v1 = $dp[$i - 1][$j];
                        $v2 = $dp[$i - 1][$j - $aList[$i - 1]] + $aList[$i - 1];
                        $dp[$i][$j] = max($v1, $v2);
                    }

                    if($dp[$i][$j] === $S) return true;
                }
            }
        }

        return false;
    }
}
