<?php

namespace App\Entity\Shapes;

/**
 * this is the base class that can be used for calculation
 */
abstract class Shape
{
    abstract function getSurface(): float;

    abstract function getCircumference(): float;

}