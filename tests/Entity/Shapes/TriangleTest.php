<?php

namespace App\Tests\Entity\Shapes;

use App\Entity\Shapes\Circle;
use App\Entity\Shapes\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    public function test_triangle_value()
    {
        $triangle = new Triangle(1, 2, 2);
        $this->assertEquals(0.96825, $triangle->getSurface());
        $this->assertEquals(5, $triangle->getCircumference());
    }
}