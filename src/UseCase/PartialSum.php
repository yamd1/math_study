<?php

namespace App\UseCase;

use PhpParser\Node\Expr\AssignOp\ShiftLeft;

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


    public function f(array $array)
    {
        // 先頭の要素を取り出す
        $N = array_shift($array);
        $result = [];

        for ($i = 0; $i <= $N; $i ++)
        {
            if (count($array) == 0) return $result;
            if (count($array) == 1)
            {
                $result[] = $array[0];
                return $result;
            } 
            if (count($array) == 2)
            {
                $result[] = (int)((string)$array[0] . (string)$array[1]);
                return $result;
            } 

            $v1 = (int)(((string)$array[0]) . ((string)$array[1]));
            $v2 = (int)(((string)$array[1]) . ((string)$array[2]));

            echo (string)$v1 . ' : ' . (string)$v2 . "\n";
            
            if ($v1 >= $v2)
            {
                $result[] = $v1;
                array_shift($array);
                array_shift($array);
            } 
            else if ($v1 < $v2)
            {
                $result[] = $array[0];
                $result[] = $v2;
                var_dump($result);
                array_shift($array);
                array_shift($array);
                array_shift($array);
            }
        }
    }
}
