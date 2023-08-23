<?php

namespace App\UseCase;

class RecurrenceFormula
{
    function __construct()
    {
    }

    /**
     * @param int $N 足場の数
     * @param array<int> $iList それぞれの足場の高さ
     * @return array<int> $dp それぞれの足場にたどり着くための最小のコスト
     */
    public function dynamicPlanFrog(int $N, array $iList)
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

    /**
     * @param int $N 階段の数
     * @return array<int> $dp 各段にたどり着くためのパターン数
     */
    public function dynamicPlanStairs(int $N)
    {
        $dp = [];

        for ($i = 0; $i <= $N; $i ++)
        {
            if($i <= 1) $dp[$i] = 1;
            if($i >= 2) 
            {
                $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
            }
        }

        return $dp;
    }
}
