<?php

namespace App\Controller;

use App\Repository\OneTenRepository;
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
        return $this->render('home/index.html.twig');

    }

    /**
     * @Route("/yesNo", name="yesNo")
     */
    public function two ()
    {
        return $this->render('home/yesno.html.twig');

    }

    /**
     * @Route("/questionnnaire", name="questionnaire")
     * @param OneTenRepository $oneTenRepository
     * @return Response
     */
    public function three (OneTenRepository $oneTenRepository)
    {
        $posts = $oneTenRepository->findAll();

        return $this->render('home/questionnaire.htm.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/oneTen", name="oneTen")
     */
    public function one ()
    {
        return $this->render('home/oneten.html.twig');
    }
}

