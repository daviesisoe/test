<?php

namespace App\Controller;

use App\Entity\Questionnaire;
use App\Entity\YesNo;
use App\Entity\OneTen;
use App\Form\YesNoType;
use App\Form\QuestionnaireType;
use App\Form\PostType;
use App\Repository\AnswersRepository;
use App\Repository\YesAnswersRepository;
use App\Repository\YesNoRepository;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionnaireAnswersRepository;
use App\Repository\OneTenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/post", name="post.")
 */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param OneTenRepository $oneTenRepository
     * @param YesNoRepository $yesNoRepository
     * @param QuestionnaireRepository $questionnaireRepository
     * @return Response
     */
    public function index(OneTenRepository $oneTenRepository, YesNoRepository $yesNoRepository, QuestionnaireRepository $questionnaireRepository)

    {
        $posts = $oneTenRepository->findAll();
	$questions = $yesNoRepository->findAll();
	$question = $questionnaireRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
		'yes' => $questions,
		'question' => $question
        ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */

    public function create (Request $request)
    {
        //create a new question
        $post = new OneTen();
        //create form function from form file
        $form = $this->createForm(PostType::class, $post);

        //form submission
        $form->handleRequest($request);

        //check if form is submitted
        if ($form->isSubmitted())
        {
            //entity manager to actually post to database
             $em = $this->getDoctrine()->getManager();
             $em->persist($post);
             $em->flush();

             //return a redirect to index page
            return $this->redirect($this->generateUrl('post.index'));
        }




        //return a response
        return $this->render('post/create.html.twig', [
            //parse form in view
            'formName' => $form->createView()
        ]);



    }

//show the yesNo repository

    /**
     * @Route("/yes", name="create_yes_no")
     * @param Request $request
     * @return Response
     */

    public function yes (Request $request)
    {
        //create a new question
        $post = new YesNo();
        //create form function from form file
        $form = $this->createForm(YesNoType::class, $post);

        //form submission
        $form->handleRequest($request);

        //check if form is submitted
        if ($form->isSubmitted())
        {
            //entity manager to actually post to database
             $em = $this->getDoctrine()->getManager();
             $em->persist($post);
             $em->flush();

             //return a redirect to index page
            return $this->redirect($this->generateUrl('post.index'));
        }




        //return a response
        return $this->render('post/create.html.twig', [
            //parse form in view
            'formName' => $form->createView()
        ]);



    }

//show the questionnaire

    /**
     * @Route("/questionnaires", name="create_questionnaire")
     * @param Request $request
     * @return Response
     */

    public function questionnare (Request $request)
    {
        //create a new question
        $post = new Questionnaire();
        //create form function from form file
        $form = $this->createForm(QuestionnaireType::class, $post);

        //form submission
        $form->handleRequest($request);

        //check if form is submitted
        if ($form->isSubmitted())
        {
            //entity manager to actually post to database
             $em = $this->getDoctrine()->getManager();
             $em->persist($post);
             $em->flush();

             //return a redirect to index page
            return $this->redirect($this->generateUrl('post.index'));
        }




        //return a response
        return $this->render('post/create.html.twig', [
            //parse form in view
            'formName' => $form->createView()
        ]);



    }


    /**
     * @route("/show/{id}", name="show")
     * @param $id
     * @param OneTenRepository $oneTenRepository
     * @param AnswersRepository $answersRepository
     * @return Response
     */

    public function show($id, OneTenRepository $oneTenRepository, AnswersRepository $answersRepository)

    {
        $post = $oneTenRepository->find($id);

        $answers = $answersRepository->findby(['oneTen'=> $id]);

       

        //create the show view
        return $this->render('show.html.twig', [
            'question' => $post,
		'answer' => $answers
        ]);
    }

    /**
     * @route("/show_yes/{id}", name="show_yes")
     * @param $id
     * @param YesAnswersRepository $yesAnswersRepository
     * @param YesNoRepository $yesNoRepository
     * @return Response
     */

    public function show_yes ($id, YesNoRepository $yesNoRepository, YesAnswersRepository $yesAnswersRepository)

    {
        $post = $yesNoRepository->find($id);

        $answers = $yesAnswersRepository->findby(['yesno'=> $id]);

       

        //create the show view
        return $this->render('show.html.twig', [
            'question' => $post,
		'answer' => $answers
        ]);
    }


    /**
     * @route("/show_questionnaire/{id}", name="show_questionnaire")
     * @param $id
     * @param  QuestionnaireRepository $questionnaireRepository
     * @param QuestionnaireAnswersRepository $questionnaireAnswersRepository
     * @return Response
     */

    public function show_questionnaire ($id, QuestionnaireRepository $questionnaireRepository, QuestionnaireAnswersRepository $questionnaireAnswersRepository)

    {
        $post = $questionnaireRepository->find($id);

        $answers = $questionnaireAnswersRepository->findby(['qustionnaire'=> $id]);

       

        //create the show view
        return $this->render('show.html.twig', [
            'question' => $post,
		'answer' => $answers
        ]);
    }


    /**
     * @route("/delete/{id}", name="delete")
     * @param $id
     * @param OneTenRepository $oneTenRepository
     * @return Response
     */

    public function remove ($id, OneTenRepository $oneTenRepository)
    {
        $post = $oneTenRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();


        $this->addFlash('success', 'Questionnaire Question was successfully removed!');

        //redirect user to index page
        return $this->redirect($this->generateUrl('post.index'));


    }


    /**
     * @route("/delete_yes/{id}", name="delete_yes")
     * @param $id
     * @param YesNoRepository $yesNoRepository
     * @return Response
     */

    public function remove_yes ($id, YesNoRepository $yesNoRepository)
    {
        $post = $yesNoRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();


        $this->addFlash('success_yes', 'Yes_No Question was successfully removed!');

        //redirect user to index page
        return $this->redirect($this->generateUrl('post.index'));


    }


    /**
     * @route("/delete_questionnaire/{id}", name="delete_questionnaire")
     * @param $id
     * @param QuestionnaireRepository $questionnaireRepository
     * @return Response
     */

    public function remove_questionnaire ($id, QuestionnaireRepository $questionnaireRepository)
    {
        $post = $questionnaireRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();


        $this->addFlash('success_questionnaire', 'One_Ten Question was successfully removed!');

        //redirect user to index page
        return $this->redirect($this->generateUrl('post.index'));


    }
}
