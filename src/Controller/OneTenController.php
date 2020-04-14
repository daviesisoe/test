<?php

namespace App\Controller;

use App\Entity\OneTen;
use App\Form\AnswerType;
use App\Form\OneTenType;
use App\Repository\OneTenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/one/ten")
 */
class OneTenController extends AbstractController
{
    /**
     * @Route("/", name="one_ten_index", methods={"GET"})
     */
    public function index(OneTenRepository $oneTenRepository): Response
    {
        return $this->render('one_ten/index.html.twig', [
            'one_tens' => $oneTenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="one_ten_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $oneTen = new OneTen();
        $form = $this->createForm(OneTenType::class, $oneTen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($oneTen);
            $entityManager->flush();

            return $this->redirectToRoute('one_ten_index');
        }

        return $this->render('one_ten/new.html.twig', [
            'one_ten' => $oneTen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="one_ten_show", methods={"GET"})
     */
    public function show(Request $request, OneTen $oneTen): Response
    {
        $form = $this->createForm(AnswerType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('one_ten_index');
        }

        return $this->render('one_ten/show.html.twig', [
            'one_ten' => $oneTen,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="one_ten_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OneTen $oneTen): Response
    {
        $form = $this->createForm(OneTenType::class, $oneTen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('one_ten_index');
        }

        return $this->render('one_ten/edit.html.twig', [
            'one_ten' => $oneTen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="one_ten_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OneTen $oneTen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oneTen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($oneTen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('one_ten_index');
    }
}
