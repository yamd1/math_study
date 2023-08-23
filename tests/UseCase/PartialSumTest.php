<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\PartialSum;

final class PartialSumTest extends TestCase
{

    public static function dataProvider()
    {
        return [
            "case1" => [2, 3, [1, 2], true],
            /* "case2" => [3, 11, [2, 5, 9], true], */
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function test_FullSearch(int $N, int $S, array $aList, bool $except)
    {
        $instance = new PartialSum;
        $result = $instance->fullSearch($N, $S, $aList);

        $this->assertEquals($except, $result);
    }
}
