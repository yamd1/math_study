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

    public function A07(int $n, int $d, array $days): string
    {
        $dayArray = array_fill(0, $n+2, 0);

        // 各参加者が参加した日に1を足す。参加者が参加した最終日から1を引く
        for($i = 0; $i < $d; $i ++)
        {
            $exploded = explode(" ", $days[$i]);
            $s = (int)$exploded[0];
            $e = (int)$exploded[1];
            $dayArray[$s] += 1;
            $dayArray[$e + 1] -= 1;
        }

        $sumArray = array();
        for ($i = 1; $i <= $n; $i ++)
        {
            if($i === 1)
            {
                $sumArray[$i] = $dayArray[$i];
                continue;
            }
            $sumArray[$i] = $sumArray[$i - 1] + $dayArray[$i];
        }

        
        return array_reduce($sumArray, function($ax, $dx){ return (string)$ax . (string)$dx; });
    }

    public function A08(int $x, int $y, array $matrix, array $sections)
    {
        $arr = [];
        for($i = 0; $i <= $x; $i ++)
        {
            $arr[$i] = array_fill(0, $y+1, 0);
        }

        // 行の累積和を計算する
        for($i = 1; $i <= $x; $i ++)
        {
            for($j = 1; $j <= $y; $j ++)
            {
                if($j === 1)
                {
                    $arr[$i][$j] = $matrix[$i-1][$j-1];
                    continue;
                }
                $arr[$i][$j] = $matrix[$i-1][$j-1] + $arr[$i][$j-1];
            }
        }

        // 列の累積和を計算する
        for($i = 1; $i <= $x; $i ++)
        {
            for($j = 1; $j <= $y; $j ++)
            {
                if($i === 1)
                {
                    continue;
                }
                $arr[$i][$j] += $arr[$i-1][$j];
            }
        }

        $result = [];
        for($i = 0, $l = count($sections); $i < $l; $i ++)
        {
            $result[] = 
                ($arr[$sections[$i][0]-1][$sections[$i][1]-1] 
                + 
                $arr[$sections[$i][2]][$sections[$i][3]]) 
                
                -

                ($arr[$sections[$i][0]-1][$y] 
                + 
                $arr[$x][$sections[$i][1]-1]);
        }

        return $result;
    }
}


