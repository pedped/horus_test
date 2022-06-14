<?php

namespace App\Entity\DTO;

class TriangleDTO
{

    public string $type = "triangle";
    public float $a;
    public float $b;
    public float $c;
    public float $surface;
    public float $circumference;

    public function __construct(float $a, float $b, float $c, float $surface, float $circumference)
    {

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->surface = $surface;
        $this->circumference = $circumference;
    }
}