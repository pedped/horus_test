<?php

namespace App\Entity\Shapes;
use Symfony\Component\Validator\Constraints as Assert;

class Triangle extends Shape
{

    /**
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="Please enter valid 'a' value"
     * )
     * @Assert\GreaterThan(
     *     value = 0,
     *     message="the 'a' value should be greater than 0"
     * )
     */
    private float $a;


    /**
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="Please enter valid 'b' value"
     * )
     * @Assert\GreaterThan(
     *     value = 0,
     *     message="the 'b' value should be greater than 0"
     * )
     */
    private float $b;

    /**
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="Please enter valid 'c' value"
     * )
     * @Assert\GreaterThan(
     *     value = 0,
     *     message="the 'c' value should be greater than 0"
     * )
     */
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * @return float
     */
    public function getA(): float
    {
        return $this->a;
    }

    /**
     * @param float $a
     */
    public function setA(float $a): void
    {
        $this->a = $a;
    }

    /**
     * @return float
     */
    public function getB(): float
    {
        return $this->b;
    }

    /**
     * @param float $b
     */
    public function setB(float $b): void
    {
        $this->b = $b;
    }

    /**
     * @return float
     */
    public function getC(): float
    {
        return $this->c;
    }

    /**
     * @param float $c
     */
    public function setC(float $c): void
    {
        $this->c = $c;
    }


    /**
     *  calculate the surface of the triangle
     * @return float
     */
    function getSurface(): float
    {
        // to calculate the surface of the Triangle, we have to use 'heron' method,
        // to do this, we need circumference first
        $halfOfCircumference = $this->getCircumference() / 2;

        // now, we can use heron method
        $result = sqrt($halfOfCircumference * ($halfOfCircumference - $this->getA())
            * ($halfOfCircumference - $this->getB())
            * ($halfOfCircumference - $this->getC()));

        // we have to round it because sometimes the sum of float values
        // returns strange results like 12.25 + 2.5 = 14.7444444444444444444
        return round($result, 5);

    }

    /**
     *  calculate the circumference of the triangle
     * @return float
     */
    function getCircumference(): float
    {
        // first, have a sum of the values
        $result = $this->getA() + $this->getB() + $this->getC();

        // we have to round it because sometimes the sum of float values
        // returns strange results like 12.25 + 2.5 = 14.7444444444444444444
        return round($result, 5);
    }
}