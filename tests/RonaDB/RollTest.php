<?php

namespace RonaDB;

use Webmozart\Assert\Assert;

class RollTest extends \PHPUnit_Framework_TestCase
{
    private $roll;

    public function setUp()
    {
        $this->roll = new Roll();
    }

    /**
     *
     */
    public function testGetRollsPosibilitiesFirstDice()
    {
        $this->roll->addDice();
        $Me7 = $this->roll->getNumberPosibilitiesMajorOrEqualThan(7);
        $total = $this->roll->getTotalNumberPosibilities();
        $this->assertEquals(6, $total);
        $this->assertEquals(0, $Me7);
    }

    /**
     *
     */
    public function testGetRollsPosibilitiesSecondDice()
    {
        $this->roll->addDice();
        $this->roll->addDice();
        $Me7 = $this->roll->getNumberPosibilitiesMajorOrEqualThan(7);
        $total = $this->roll->getTotalNumberPosibilities();
        $this->assertEquals(36, $total);
        $this->assertEquals(21, $Me7);
    }

    /**
     *
     */
    public function testGetRollsPosibilitiesThirdDice()
    {
        $this->roll->addDice();
        $this->roll->addDice();
        $this->roll->addDice();
        $Me7 = $this->roll->getNumberPosibilitiesMajorOrEqualThan(7);
        $total = $this->roll->getTotalNumberPosibilities();
        $this->assertEquals(6**3, $total);
        $this->assertEquals(196, $Me7);
    }
}