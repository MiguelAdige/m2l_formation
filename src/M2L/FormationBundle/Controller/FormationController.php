<?php

namespace M2L\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormationController extends Controller
{
    public function indexAction()
    {
        return $this->render('M2LFormationBundle:Default:index.html.twig');
    }
}
