<?php

namespace RonaDB;


class Roll {

    const DICE_MINIUM_VALUE = 1;
    const DEFAUL_DICE_SIDES = 6;

    private $posibilities;

    public function __construct()
    {
        $this->posibilities = [];
    }

    public function getRollsPosibilities()
    {
        return $this->posibilities;
    }

    public function addDice($sides = self::DEFAUL_DICE_SIDES)
    {
        if ($this->haveDices()) {
            $this->multiplyPosibilitiesByClonation($sides);
        } else {
            $this->initializePosibilities($sides);
        }
    }

    private function multiplyPosibilitiesByClonation($sides)
    {
        $oldPosibilities = $this->posibilities;
        $dicesPosibleValues = $this->getDicePosibleValues($sides);
        $this->posibilities = [];
        foreach ($oldPosibilities as $posibility) {
            foreach ($dicesPosibleValues as $posibleValue) {
                $this->posibilities[] = $this->createNewPosibilityAddingValue($posibleValue, $posibility);
            }
        }

    }

    private function initializePosibilities($sides)
    {
        $dicesPosibleValues = $this->getDicePosibleValues($sides);
        $this->posibilities = [];
        foreach ($dicesPosibleValues as $posibleValue) {
            $this->posibilities[] = $this->createNewPosibilityAddingValue($posibleValue);
        }
    }

    private function createNewPosibilityAddingValue($value, $clone = null)
    {
        $newPosibility = (empty($clone))? new Posibility() : clone $clone;
        $newPosibility->addValue($value);

        return $newPosibility;
    }

    private function getDicePosibleValues($sides)
    {
        return range(self::DICE_MINIUM_VALUE, $sides);
    }

    private function haveDices()
    {
        return !empty($this->posibilities);
    }

    public function getTotalNumberPosibilities()
    {
        return count($this->posibilities);
    }

    public function getNumberPosibilitiesMajorOrEqualThan($x)
    {
        $count = 0;
        foreach ($this->posibilities as $posibility) {
            if ($posibility->isMajorOrEqualThan($x)) {
                $count++;
            }
        }
        return $count;
    }

}