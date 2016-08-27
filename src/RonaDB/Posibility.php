<?php
/**
 * Created by PhpStorm.
 * User: vizzent
 * Date: 25/08/16
 * Time: 19:43
 */

namespace RonaDB;


class Posibility {

    private $arrayValues;

    public function __construct()
    {
        $this->arrayValues = [];
    }

    public function addValue($value)
    {
        $this->arrayValues[] = $value;
    }

    public function isMajorOrEqualThan($x)
    {
        return $this->getTotal() >= $x;
    }

    public function getTotal()
    {
        return array_sum($this->arrayValues);
    }

    public function getValues()
    {
        return $this->arrayValues;
    }
}