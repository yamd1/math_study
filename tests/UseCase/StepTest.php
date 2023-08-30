<?php

use App\UseCase\Step;
use PHPUnit\Framework\TestCase;

class StepTest extends TestCase
{
    public static function theFirstProblemDataProvider()
    {
        return [
            "case 1" => [2, 4],
            "case 2" => [8, 64], 
            "case 3" => [100, 10000], 
        ];
    }

    /**
     * @test
     * @dataProvider theFirstProblemDataProvider
     */
    public function test_theFirstProblem(int $N, int $except)
    {
        $instance = new Step;
        $result = $instance->theFirstProblem($N);

        $this->assertEquals($except, $result);
    }

    /*public static function DataProvider() */
    /*{ */
    /*} */

    /*/1** */
    /* * @test */
    /* * @dataProvider DataProvider */
    /* *1/ */
    /*public function test_(int $N, int $except) */
    /*{ */
    /*} */

    public static function A02DataProvider()
    {
        return [
            "case 1" => [40, [10, 20, 30, 40, 50], "Yes"],
            "case 2" => [28, [30, 10, 40, 10, 50, 90], "No"]
        ];
    }

    /**
     * @test
     * @dataProvider A02DataProvider
     */
    public function test_A02(int $n, array $nums, string $except)
    {
        $instance = new Step;
        $result = $instance->A02($n, $nums);
        $this->assertEquals($except, $result);
    }

    public static function A04DataProvider()
    {
        return [
            "case 1" => [13, "0000001101"],
            "case 2" => [37, "0000100101"],
            "case 3" => [1000, "1111101000"]
        ];
    }

    /**
     * @test
     * @dataProvider A04DataProvider
     */
    public function test_A04(int $n, string $except)
    {
        $instance = new Step;
        $result = $instance->A04($n);
        $this->assertEquals($except, $result);
    }

    
    public static function A06DataProvider()
    {
        return [
            "case1" => [[62, 65, 41, 13, 20, 11, 18, 44, 53, 12, 18, 17,14, 10,39], 4, 13, 220],
            "case2" => [[62, 65, 41, 13, 20, 11, 18, 44, 53, 12, 18, 17,14, 10,39], 3, 10, 212],
            "case3" => [[62, 65, 41, 13, 20, 11, 18, 44, 53, 12, 18, 17,14, 10,39], 2, 15, 375],
        ];
    }
    /**
     * @test
     * @dataProvider A06DataProvider
     */
    public function test_A06(array $nums, int $startDate, int $endDate, int $except)
    {
        $instance = new Step;
        $result = $instance->A06($nums, $startDate, $endDate);
        $this->assertEquals($except, $result);
    }


    public static function A07DataProvider()
    {
        return [
            "case0" => [4, 2, ["2 3", "3 4"], "0121"],
            "case1" => [8, 5, ["2 3", "3 6", "5 7", "3 7", "1 5"], "12434320"],
        ];
    }
    /**
     * @test
     * @dataProvider A07DataProvider
     */
    public function test_A07(int $n, int $d, array $days, string $except)
    {
        $instance = new Step;
        $result = $instance->A07($n, $d, $days);
        $this->assertEquals($except, $result);
    }
}
