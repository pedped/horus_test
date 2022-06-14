<?php

namespace App\Tests\Entity\Shapes;

use App\Entity\Shapes\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function test_circle_values()
    {
        $circle = new Circle(10);
        $this->assertEquals(62.83185, $circle->getSurface());
        $this->assertEquals(314.15927, $circle->getCircumference());
    }
}