<?php

namespace App\Tests\Entity\Shapes;

use App\Entity\Services\ShapeCalculator;
use App\Entity\Shapes\Circle;
use App\Entity\Shapes\Triangle;
use PHPUnit\Framework\TestCase;

class ShapeCalculatorTest extends TestCase
{
    public function test_shapes_surface()
    {

        // make an array
        $shapes = array();
        $shapes[] = new Circle(5);
        $shapes[] = new Triangle(1, 2, 2);

        // make a new shape calculator
        $shapeCalculator = new ShapeCalculator();

        // now , validate the result
        $this->assertEquals(32.38418, $shapeCalculator->calculateSurface($shapes));

    }

    public function test_shapes_circumference()
    {

        // make an array
        $shapes = array();
        $shapes[] = new Circle(5);
        $shapes[] = new Triangle(1, 2, 2);

        // make a new shape calculator
        $shapeCalculator = new ShapeCalculator();

        // now , validate the result
        $this->assertEquals(83.53982, $shapeCalculator->calculateCircumference($shapes));

    }
}