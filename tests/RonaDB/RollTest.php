<?php

namespace RonaDB;

use Webmozart\Assert\Assert;

class RollTest  extends \PHPUnit_Framework_TestCase
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
        Assert::eq($Me7, 0);
        Assert::eq($total, 6);
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
        Assert::eq($total, 36);
        Assert::eq($Me7, 21);
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
        Assert::eq($total, 6**3);
        Assert::eq($Me7, 196);
        //var_dump($this->roll);
    }

    /**
     *
    public function testGetRollsPosibilitiesFourthDice()
    {
        $this->roll->addDice();
        //var_dump($this->roll);
    }
*/
}