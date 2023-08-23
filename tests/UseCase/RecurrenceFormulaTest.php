<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\RecurrenceFormula;

class RecurrenceFormulaTest extends TestCase
{

    public static function dynamicPlanFrogDataProvider()
    {
        return [
            "case 1" => [5, [8, 6, 9, 2, 1]]
        ];
    }
    /**
     * @test
     * @dataProvider dynamicPlanFrogDataProvider
     */
    function test_dynamicPlanFrog(int $N, array $iList)
    {

        $instance = new RecurrenceFormula;
        $result = $instance->dynamicPlanFrog($N, $iList);
        $except = [0, 2, 1, 6, 7];

        $this->assertEquals($except, $result);
    }



}
