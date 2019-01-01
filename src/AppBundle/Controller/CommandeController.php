<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Commande controller.
 *
 * @Route("admin/commande")
 */
class CommandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     * @Route("/", name="admin_commande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('AppBundle:Commande')->findAll();

        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     * @Route("/{id}", name="admin_commande_show")
     * @Method("GET")
     */
    public function showAction(Commande $commande)
    {

        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,
        ));
    }
}
