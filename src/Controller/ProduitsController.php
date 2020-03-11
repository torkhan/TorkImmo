<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits")
 */
class ProduitsController extends AbstractController
{
    /**
     * @Route("/", name="produits_index", methods={"GET"})
     */
    public function index(Request $request, ProduitsRepository $produitsRepository, PaginatorInterface $paginator): Response
    {

        $pagination = $paginator->paginate(
            $produitsRepository->findAllVisibleQuery(),
            $request->query->getInt('page', 1), /*page number*/
            4/*limit per page*/
        );
        return $this->render('produits/index.html.twig', [
            'produits' => $produitsRepository->findAll(),
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="produits_new", methods={"GET","POST"})
     */
    public function new(Request $request, ProduitsRepository $produitsRepository): Response
    {

        $produit = new Produits();

        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produits_index');
        }

        return $this->render('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/{id}/showAll", name="produits_showAll", methods={"GET"})
     */
    public function showAll(Produits $produit): Response
    {
        $this->marker($produit);
        return $this->render('produits/showAll.html.twig', [
            'produit' => $produit,

        ]);
    }
    /**
     * @Route("/{id}/showRecherche", name="produits_showRecherche", methods={"GET"})
     */
    public function showRecherche(Produits $produit): Response
    {
        $this->marker($produit);
        return $this->render('produits/showRecherche.html.twig', [
            'produit' => $produit,

        ]);
    }

    /**
     * @Route("/{id}/show", name="produits_show", methods={"GET"})
     */
    public function show(Produits $produit): Response
    {
        $this->marker($produit);
        return $this->render('produits/show.html.twig', [
            'produit' => $produit,

        ]);
    }
    /**
     * @Route("/{id}/showAcheter", name="produits_showAcheter", methods={"GET"})
     */
    public function showAcheter(Produits $produit): Response
    {
        $this->marker($produit);
        return $this->render('produits/showAcheter.html.twig', [
            'produit' => $produit,

        ]);
    }
    /**
     * @Route("/{id}/recherche", name="produits_recherche", methods={"GET"})
     */
    public function recherche(Produits $produit): Response
    {
        return $this->render('produits/recherche.html.twig', [
            'produit' => $produit,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="produits_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produits $produit): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produits_index');
        }

        return $this->render('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produits_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produits $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produits_index');
    }
    public function marker($articles){



        $array = [];//passage resultat bdd en json pour l affichage des markers

            $seau = [
                'adresse' => $articles->getAdresse(),
                'prixHt' => $articles->getPrixHt(),
                'longitude' => $articles->getLongitude(),
                'latitude' => $articles->getLatitude(),
                'typeProduits' => $articles->getTypeProduits()->getType(),
            ];array_push($array, $seau);
        dump($array);
        file_put_contents('libs/json/marker.json', json_encode($array)) ;

    }
}
