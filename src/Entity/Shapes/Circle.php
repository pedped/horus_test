<?php

namespace App\Entity\Shapes;
use Symfony\Component\Validator\Constraints as Assert;

class Circle extends Shape
{

    /**
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="Please enter valid radius"
     * )
     * @Assert\GreaterThan(
     *     value = 0,
     *     message="the radius value should be greater than 0"
     * )
     */
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * @param float $radius
     */
    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    /**
     * calculate the surface of the circle
     * @return float
     */
    function getSurface(): float
    {
        // first, get the result
        $result = 2 * pi() * $this->getRadius();

        // we have to round it because sometimes the sum of float values
        // returns strange results like 12.25 + 2.5 = 14.7444444444444444444
        return round($result, 5);
    }

    /**
     * calculate the circumference of the circle
     * @return float
     */
    function getCircumference(): float
    {
        // first, get the result
        $result = pi() * $this->getRadius() * $this->getRadius();

        // we have to round it because sometimes the sum of float values
        // returns strange results like 12.25 + 2.5 = 14.7444444444444444444
        return round($result, 5);
    }


}