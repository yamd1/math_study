<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\RecurrenceFormula;

class RecurrenceFormulaTest extends TestCase
{

    public static function dynamicPlanFrogDataProvider()
    {
        return [
            "case 1" => [5, [8, 6, 9, 2, 1], [0, 2, 1, 6, 7]],
            "case 2" => [6, [8, 6, 9, 2, 1, 3], [0, 2, 1, 6, 7, 7]]
        ];
    }
    /**
     * @test
     * @dataProvider dynamicPlanFrogDataProvider
     */
    function test_dynamicPlanFrog(int $N, array $iList, array $except)
    {

        $instance = new RecurrenceFormula;
        $result = $instance->dynamicPlanFrog($N, $iList);

        $this->assertEquals($except, $result);
    }


    public static function dynamicPlanStairsDataProvider()
    {
        return [
            "case 1" => [6, [1, 1, 2, 3, 5, 8, 13]],
            "case 2" => [7, [1, 1, 2, 3, 5, 8, 13, 21]],
        ];
    }

    /**
     * @test
     * @dataProvider dynamicPlanStairsDataProvider
     */
    public function test_dynamicPlanStairs(int $N, array $except)
    {
        $instance = new RecurrenceFormula;
        $result = $instance->dynamicPlanStairs($N);
        
        $this->assertEquals($except, $result);
    }















    public static function dynamicPlanNapzacDataProvider()
    {
        return [
            "case 1" => [2, 5, [3, 2], [10, 15], 25],
            "case 2" => [4, 10, [3, 6, 4, 2], [10, 210, 130, 57], 340] 
        ];
    }

    /**
     * @test
     * @dataProvider dynamicPlanNapzacDataProvider
     */
    public function test_dynamicPlanNapzac(int $N, int $W, array $wList, array $vList, int $except)
    {
        $instance = new RecurrenceFormula;
        $result = $instance->dynamicPlanNapzac($N, $W, $wList, $vList);

        $this->assertEquals($except, $result);
    }

}
