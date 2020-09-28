<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testABSNegativeNumber()
    {
        $result = abs(-4.2);
        $this->assertEquals($result,4.2);
    }
}
