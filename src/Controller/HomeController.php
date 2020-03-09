<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Recherche;
use App\Form\RechercheType;
use App\Repository\ProduitsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, ProduitsRepository $produitsRepository, PaginatorInterface $paginator)
    {
        $recherche = new Recherche();//La recherche

        $articles = $this->recent($produitsRepository);

        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pagination = $paginator->paginate(
                $produitsRepository->rechercheProduit($recherche),
                $request->query->getInt('page', 1), /*page number*/
                4/*limit per page*/
            );
            return $this->render('produits/recherche.html.twig', ['pagination' => $pagination]);
        }
        $tab1=[];
        $tab2=[];
        for($i=0;$i<count($articles);$i++){
            if ($i<3){
                array_push($tab1, $articles[$i]);
            }
            else {
                array_push($tab2, $articles[$i]);
            }
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'tab1' => $tab1,//sépare en 2 tableaux pour avoir 2 carroussels de 3 biens
            'tab2' => $tab2,
        ]);
    }

    public function recent($produitsRepository)
    {
        $articles = $produitsRepository->findBy([], ['updatedAt' => 'desc'], 6);//recevoir les 6 derniers biens créés pour affichage carroussel index
        return $articles;

    }


}
