<?php

use App\UseCase\SingleNum;
use PHPUnit\Framework\TestCase;

class SingleNumTest extends TestCase
{

    public static function dataProvider()
    {
        return [
            "case 1" => [[1, 2, 2], 1],
            "case 2" => [[4,1,2,1,2], 4],
            "case 3" => [[1], 1]
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function test_run(array $nums, int $except)
    {
        $instance = new SingleNum;
        $result = $instance->run($nums);

        $this->assertEquals($except, $result);
    }
}
