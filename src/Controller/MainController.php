<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return new Response('<h1 style="font-size: 200px;">i love coding</h1>');

    }
    /**
     * @Route("/custom", name="custom")
     */
    public function custom () {
        return new Response('<h1 style="font-size: 200px;">welcome to my page</h1>');
    }
}

