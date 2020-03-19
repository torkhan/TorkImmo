<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier_index")
     */
    public function index(SessionInterface $session, ProduitsRepository $produitsRepository)
    {
        $panier = $session->get('panier',[]);

        $panierRempli =[];

        foreach($panier as $id => $quantity){
            $panierRempli[] = [
               'produits' => $produitsRepository->find($id),
               'quantity' => $quantity
            ];

        }

        $total =0;

       foreach($panierRempli as $item){
            $totalItems = $item['produits']->getprix() * $item['quantity'];
            $total += $totalItems;
        }



        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'item'=> $panierRempli,
            'total' => $total,

        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     * @param $id
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function add($id, SessionInterface $session){


        $panier = $session->get('panier', []);

    if(!empty($panier[$id])){
        $panier[$id]++;
    }else{
        $panier[$id] = 1;

    }

        $session->set('panier', $panier);

        return $this->redirectToRoute("panier_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
    */
    public function remove($id, SessionInterface $session){
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $this->redirectToRoute("panier_index");
    }
}
