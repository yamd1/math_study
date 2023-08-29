<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\PartialSum;

final class PartialSumTest extends TestCase
{

    public static function dynamicPlanPartialSumDataProvider()
    {
        return [
            "case1" => [2, 3, [1, 2], true],
            "case2" => [3, 11, [2, 5, 9], true],
            "case3" => [0, 11, [], false],
            "case4" => [40, 200, [
                1, 3, 55, 23, 45, 5, 6, 33, 61, 10,
                21, 9, 36, 67, 31, 11, 12, 46, 21, 8,
                99, 94, 23, 46, 43, 67, 98, 20, 85, 54,
                95, 56, 64, 60, 89, 81, 91, 83, 87, 44
            ], true],
            "case5" => [2, 6, [9, 7], false],
            "case6" => [3, 10, [7, 5, 3], true],
        ];
    }
    /**
     * @test
     * @dataProvider dynamicPlanPartialSumDataProvider
     */
    public function test_dynamicPlanPartialSum(int $N, int $S, array $aList, bool $except)
    {
        $instance = new PartialSum;
        $result = $instance->dynamicPlanPartialSum($N, $S, $aList);

        $this->assertEquals($except, $result);
    }

}
