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
}
