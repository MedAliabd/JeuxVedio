<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Categorie;
use AppBundle\Entity\Produit;

class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
       $em = $this->getDoctrine()->getManager();
       $categories = $em->getRepository(Categorie::Class)->findAll();
       return $this->render('default/index.html.twig',['categories' => $categories ]);

    }
     /**
     * @Route("/{id}", name="show_produit")
     */
    public function showAction(Request $request, $id)
    {
       
      $em = $this->getDoctrine()->getManager();
      $produits = $em->getRepository(Produit::Class)->findByCategorie($id);
      $categorie = $em->getRepository(Categorie::Class)->find($id);

      return $this->render('default/produit.html.twig',[
        'produits' => $produits,
        'categorie' => $categorie
         ]);

    }


    /**
     * @Route("/details_produit/{id}", name="details_produit")
     */
    public function details_produit(Request $request, $id)
    {
       
      $em = $this->getDoctrine()->getManager();
      $produits = $em->getRepository(Produit::Class)->find($id);
      

      return $this->render('default/detail_produit.html.twig',[
        'produits' => $produits,
       
         ]);

    }
}
