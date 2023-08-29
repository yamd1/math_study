<?php

namespace App\UseCase;

class Step
{
    public function theFirstProblem(int $N): int
    {
        return $N ** 2;
    }

    public function A02(int $n, array $nums, bool $isSorted=false): string
    {
        if (!$isSorted)
            sort($nums);

        if(count($nums) <= 1)
            return $n === $nums[0] ? "Yes" : "No";

        $center = floor(count($nums) / 2);
        $splitedArray = array_chunk($nums, $center);

        if($n < $nums[$center])
            return self::A02($n, $splitedArray[0], true);

        if($n > $nums[$center])
            return self::A02($n, $splitedArray[1], true);

        if($n === $nums[$center])
            return "Yes";
    }

    public function A04(int $n): string
    {
        $result = "";
        for ($i = 9; $i >= 0; $i --)
        {
            $w = 2 ** $i;
            $result .= (string)((floor($n / $w)) % 2);
        }
        return $result;
    }

    public function A06(array $nums, int $startDate, int $endDate): int
    {
        $sumArray = array();
        for($i=0, $len=count($nums); $i < $len; $i ++)
        {
            if($i === 0)
            {
                $sumArray[$i] = $nums[$i];
                continue;
            }
                

            $sumArray[$i] = $nums[$i] + $sumArray[$i - 1];
        }

        return $sumArray[$endDate-1] - $sumArray[$startDate-2];
    }
}
