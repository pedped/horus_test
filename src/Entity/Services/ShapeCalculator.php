<?php

namespace App\Entity\Services;

class ShapeCalculator
{
    /**
     * this function will get list of the shapes and calculate
     * the surface and then return sum of them
     * @param array $shapes
     * @return float
     */
    public function calculateSurface(array $shapes): float
    {
        // calculate the values
        $result = 0;
        foreach ($shapes as $shape) {
            $result += $shape->getSurface();
        }

        // round the value
        return round($result, 5);
    }

    /**
     * this function will get list of the shapes and calculate
     * the circumference and then return sum of them
     * @param array $shapes
     * @return float
     */
    public function calculateCircumference(array $shapes): float
    {
        // calculate the values
        $result = 0;
        foreach ($shapes as $shape) {
            $result += $shape->getCircumference();
        }

        // round the value
        return round($result, 5);
    }
}