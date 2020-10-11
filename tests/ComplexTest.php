<?php

use Complex\ComplexImmutable as Complex;
use PHPUnit\Framework\TestCase;

class ComplexTest extends TestCase
{
    /**
     * Data provider
     *
     * @return iterable
     */
    public function provider(): iterable
    {
        static $data;
        if (!$data) {
            $data = [
                [new Complex(1.2, 1.3), new Complex(2.1, 3.1)],
            ];
        }

        return $data;
    }

    /**
     * @dataProvider provider
     */
    public function testAdd(Complex $a, Complex $b)
    {
        $this->assertEquals('(3.300000;4.400000)', $a->add($b));
    }

    /**
     * @dataProvider provider
     */
    public function testSub(Complex $a, Complex $b)
    {
        $this->assertEquals('(0.900000;1.800000)', $b->sub($a));
    }

    /**
     * @dataProvider provider
     */
    public function testMul(Complex $a, Complex $b)
    {
        $this->assertEquals('(-1.510000;6.450000)', $a->mul($b));
    }

    /**
     * @dataProvider provider
     */
    public function testDiv(Complex $a, Complex $b)
    {
        $this->assertEquals('(2.092652;0.316294)', $b->div($a));
    }

}
