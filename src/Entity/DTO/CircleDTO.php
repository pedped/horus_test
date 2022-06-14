<?php

namespace App\Entity\DTO;


class CircleDTO
{

    public string $type = "circle";
    public float $radius;
    public float $surface;
    public float $circumference;

    public function __construct(float $radius, float $surface, float $circumference)
    {

        $this->radius = $radius;
        $this->surface = $surface;
        $this->circumference = $circumference;
    }
}