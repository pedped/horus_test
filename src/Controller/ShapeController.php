<?php

namespace App\Controller;

use App\Entity\DTO\CircleDTO;
use App\Entity\DTO\TriangleDTO;
use App\Entity\Helpers\ValidationErrorManager;
use App\Entity\Shapes\Circle;
use App\Entity\Shapes\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShapeController extends AbstractController
{
    /**
     * this route will calculate the surface and circumference of the circle and
     * then send back the data as json to the user
     * @Route("/circle/{radius}", name="circle_calc" , methods={"GET"})
     */
    public function circle(ValidatorInterface $validator, float $radius)
    {
        // make a new object of circle
        $circle = new Circle($radius);

        // try to validate the inputs
        $errors = $validator->validate($circle);
        if (count($errors) > 0) {
            return new JsonResponse(ValidationErrorManager::getNiceOutput($errors));
        }

        // make DTO object
        $circleDTO = new CircleDTO($radius, $circle->getSurface(), $circle->getCircumference());

        // print the output
        return new JsonResponse(json_encode($circleDTO));
    }

    /**
     * this route will calculate the surface and circumference of the triangle and
     * then send back the data as json to the user
     * @Route("/triangle/{a}/{b}/{c}", name="triangle_calc" , methods={"GET"})
     */
    public function triangle(ValidatorInterface $validator, float $a, float $b, float $c)
    {
        // make a new object of triangle
        $triangle = new Triangle($a, $b, $c);

        // try to validate the inputs
        $errors = $validator->validate($triangle);
        if (count($errors) > 0) {
            return new JsonResponse(ValidationErrorManager::getNiceOutput($errors));
        }

        // make DTO object
        $triangleDTO = new TriangleDTO($a, $b, $c, $triangle->getSurface(), $triangle->getCircumference());

        // print the output
        return new JsonResponse(json_encode($triangleDTO));
    }
}