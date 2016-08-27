<?php

namespace RonaDB;

class PosibilityTest  extends \PHPUnit_Framework_TestCase
{

    private $posibility;

    public function setUp()
    {
        $this->posibility = new Posibility();
    }

    public function testAddValueAndGetTotal()
    {
        $this->assertEquals(0, $this->posibility->getTotal());
        $this->assertEquals(0, count($this->posibility->getValues()));

        $this->posibility->addValue(3);
        $this->assertEquals(3, $this->posibility->getTotal());
        $this->assertEquals(1, count($this->posibility->getValues()));

        $this->posibility->addValue(6);
        $this->assertEquals(9, $this->posibility->getTotal());
        $this->assertEquals(2, count($this->posibility->getValues()));
    }

    public function testIsMajorOrEqualThan()
    {
        $this->posibility->addValue(4);
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(0));
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(1));
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(4));
        $this->assertEquals(false, $this->posibility->isMajorOrEqualThan(5));
        $this->posibility->addValue(6);
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(9));
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(10));
        $this->assertEquals(false, $this->posibility->isMajorOrEqualThan(11));
        $this->posibility->addValue(20);
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(29));
        $this->assertEquals(true, $this->posibility->isMajorOrEqualThan(30));
        $this->assertEquals(false, $this->posibility->isMajorOrEqualThan(31));

    }
}