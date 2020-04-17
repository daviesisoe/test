<?php

namespace App\Controller;

use App\Entity\OneTen;
use App\Entity\Answers;
use App\Form\AnswerType;
use App\Repository\OneTenRepository;
use App\Repository\YesNoRepository;
use App\Repository\QuestionnaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index()
    {
        return $this->render('home/index.html.twig');

    }

    /**
     * @Route("/yesNo", name="yesNo")
     *@param YesNoRepository $yesNoRepository
     * @return Response
     */
    public function two (YesNoRepository $yesNoRepository)
    {

	$posts = $yesNoRepository->findAll();


        return $this->render('home/yesno.html.twig', [
		'posts' => $posts	
	]);

    }

    /**
     * @Route("/questionnnaire", name="questionnaire")
     * @param Request $request
     * @param OneTenRepository $oneTenRepository
     * @return Response
     */
    public function three ( OneTenRepository $oneTenRepository, Request $request)
    {

        $posts = $oneTenRepository->findAll();

 	if ($request->getMethod() == Request::METHOD_POST){
        $reply = $request->request->get('reply');
        $oneTen = $request->request->get('oneTen');
       
	$posts = $oneTenRepository->find($oneTen);

	$answer = new Answers();
	$answer->setReply($reply);
	$answer->setOneTen($posts);
	
	$em = $this->getDoctrine()->getManager();

            $em->persist($answer);
            $em->flush();

	$this->addFlash('success', 'The Question :'.$posts->getQuestion() . ' was answered successfuly');

            return  $this->redirect($this->generateUrl('questionnaire'));
    }

        return $this->render('home/questionnaire.htm.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/oneTen", name="oneTen")
     *@param QuestionnaireRepository $questionnaireRepository
     * @return Response
     */
    public function one (QuestionnaireRepository $questionnaireRepository)
    {

	$posts = $questionnaireRepository->findAll();

        return $this->render('home/oneten.html.twig',[
		'posts' => $posts
	]);
    }


    /**
     * @Route("/answer", name="answer_new", methods={"GET","POST"})
     * @param Request $request
     * @param OneTenRepository $oneTenRepository
     * @return Response
     */
    public function new(Request $request, OneTenRepository $oneTenRepository): Response
    {
        $posts = $oneTenRepository->findAll();
        $answer = new Answers();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($answer);
            $entityManager->flush();

            return $this->redirectToRoute('questionnaire');
        }

        return $this->render('home/answer.html.twig', [
            'answer' => $answer,
            'form' => $form->createView(),
            'posts' => $posts,
        ]);
    }

}

