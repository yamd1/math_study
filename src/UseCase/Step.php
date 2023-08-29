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
}
