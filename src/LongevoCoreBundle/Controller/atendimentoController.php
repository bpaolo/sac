<?php

namespace LongevoCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class atendimentoController extends Controller
{
    /**
     * @Route("/atendimento")
     */
    public function atendimentoAction()
    {
        return $this->render('LongevoCoreBundle:atendimento:atendimento.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/show")
     */
    public function showAction()
    {
        return $this->render('LongevoCoreBundle:atendimento:show.html.twig', array(
            // ...
        ));
    }

}
