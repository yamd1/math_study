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


    /**
     * @param int $N 商品数
     * @param int $W 重さの許容重量
     * @param array<int> $wList 「重さ」が格納された配列 
     * @param array<int> $vList 「価値」が格納された配列 
     * @return int 重さが許容量に収まっている商品の価値合計の最大値
     */
    public function dynamicPlanNapzac(int $N, int $W, array $wList, array $vList): int
    {
        $dp = [];
        for ($i = 0; $i <= $N; $i ++)
        {
            for ($j = 0; $j <= $W; $j ++)
            {
                // 各数値を0で初期化する
                $dp[$i][$j] = 0;

                // 何も選んでいない状態なのでスキップする
                if ($i == 0) continue;

                // 「重さ」が2次元テーブルの「重さカラム」より小さかったら、一段上のレコードの同じ重さカラムの「価値」を代入
                if ($j < $wList[$i-1]) $dp[$i][$j] = $dp[$i-1][$j];

                // 「重さ」が「重さカラム」以上だったら、
                if ($j >= $wList[$i-1]) 
                {
                    // 「一段上のレコード」の同じ「重さカラム」の価値
                    $v1 = $dp[$i - 1][$j];

                    // 「一段上のレコード」の「自分の重さを引いた重さカラム」の価値に「自分の価値」を足した価値
                    $v2 = $dp[$i - 1][$j - $wList[$i-1]] + $vList[$i-1];

                    $dp[$i][$j] = max($v1, $v2);
                }
            }
        }

        // 2次元配列の一番最後の配列の中で一番大きな数値を返却する
        return max($dp[$N]);
    }
}



