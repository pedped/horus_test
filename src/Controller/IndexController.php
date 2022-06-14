<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * this will show the home page to the user
     * @Route("/", name="homepage" , methods={"GET"})
     */
    public function homepage(): Response
    {
        return $this->render('index/homepage.html.twig');
    }
}