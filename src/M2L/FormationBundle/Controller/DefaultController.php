<?php

namespace M2L\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('M2LFormationBundle:Default:index.html.twig', array('name' => $name));
    }
}
