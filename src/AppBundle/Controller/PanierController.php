<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Categorie;
use AppBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends Controller
{
    /**
     * @Route("/panier/ajouter/{id_produit}", name="panier_ajouter")
     */
    public function panierAjouter(Produit $id_produit)
    {
        $session = new Session();
        @$cart = $session->get('sess_cart');
        @$cart[$id_produit->getId()] ++ ;
        $session->set('sess_cart', $cart);
        return $this->redirectToRoute('details_produit',['id' => $id_produit->getId() ]);
    }

   public function nbrProduitsAction(){
        $session = new Session();
        $cart = $session->get('sess_cart');
        $total = 0;
        if ($cart)
            foreach ($cart as $id => $qty) 
                $total += $qty;
            
        return new Response($total);
   }

   
    /**
     * @Route("/panier/details", name="panier_details")
     */
    public function panierDetails()
    {
        $session = new Session();
        $cart = $session->get('sess_cart');
        $products = array();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Produit::class);

        $total_ht = 0;

          // Calcul du total HT, mnt TVA et total TTC
          // On ne doit pas laisser la vue faire le calcul
          if ($cart)
            foreach ($cart as $product_id => $qty) {
                $prd = $repo->find($product_id);
                $products[] = $prd;
                $total_ht += $prd->getPrix() * $qty;
            }

        $mnt_tva = $total_ht * 10/100;
        $total_ttc = $total_ht + $mnt_tva;

        return $this->render("default/panier.html.twig",
            [
                'products' => $products,
                'cart'   => $cart,
                'total_ht' => $total_ht,
                'mnt_tva'  => $mnt_tva,
                'total_ttc'=> $total_ttc
            ]
        );
    }
    /**
      * @Route("/cart/remove/{id}", name="eshop_remove_from_cart")
      */
    function removeFromCart($id) {      
          $session = new Session();
          $cart = $session->get('sess_cart');
          unset($cart[$id]); // Remove item from row
          $session->set('sess_cart', $cart);
          
          // Retrouner au panier
          return $this->redirectToRoute('panier_details');
     }

     /**
      * @Route("/cart/clear/", name="eshop_clear_cart")
      */
     function clearCart() {      
          $session = new Session();
          $session->clear('sess_cart');
          // Retrouner au panier
          return $this->redirectToRoute('panier_details');
     }
    
}
