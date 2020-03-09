<?php

namespace App\Controller;

use App\Entity\Zip;
use App\Form\ZipType;
use App\Repository\ZipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zip")
 */
class ZipController extends AbstractController
{
    /**
     * @Route("/", name="zip_index", methods={"GET"})
     */
    public function index(ZipRepository $zipRepository): Response
    {
        return $this->render('zip/index.html.twig', [
            'zips' => $zipRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="zip_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zip = new Zip();
        $form = $this->createForm(ZipType::class, $zip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zip);
            $entityManager->flush();

            return $this->redirectToRoute('zip_index');
        }

        return $this->render('zip/new.html.twig', [
            'zip' => $zip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zip_show", methods={"GET"})
     */
    public function show(Zip $zip): Response
    {
        return $this->render('zip/show.html.twig', [
            'zip' => $zip,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="zip_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Zip $zip): Response
    {
        $form = $this->createForm(ZipType::class, $zip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zip_index');
        }

        return $this->render('zip/edit.html.twig', [
            'zip' => $zip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zip_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Zip $zip): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zip->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zip_index');
    }
}
