<?php

namespace App\UseCase;

class SingleNum
{
    public function run(array $nums)
    {
        $result = 0;
        foreach($nums as $num)
        {
            $result ^= $num;
        }

        return $result;
    }
}
