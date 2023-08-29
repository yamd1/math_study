<?php

namespace App\UseCase;

class Step
{
    public function theFirstProblem(int $N): int
    {
        return $N ** 2;
    }

    public function A02(int $n, array $nums): string
    {
        $f = 0;
        if ($f === 0)
        {
            sort($nums);
            $f ++;
        }

        if(count($nums) <= 1)
        {
            return $n === $nums[0] ? "Yes" : "No";
        }

        $center = floor(count($nums) / 2);
        $nArray = array_chunk($nums, $center);
        if($n < $nums[$center])
        {
            return self::A02($n, $nArray[0]);
        }
        if($n > $nums[$center])
        {
            return self::A02($n, $nArray[1]);
        }

        if($n === $nums[$center])
        {
            return "Yes";
        }
    }
}
