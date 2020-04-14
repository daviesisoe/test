<?php

namespace App\Controller;

use App\Entity\OneTen;
use App\Form\PostType;
use App\Repository\AnswersRepository;
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
     * @return Response
     */
    public function index(OneTenRepository $oneTenRepository)

    {
        $posts = $oneTenRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
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


        $this->addFlash('success', 'Question was successfully removed!');

        //redirect user to index page
        return $this->redirect($this->generateUrl('post.index'));


    }


}
