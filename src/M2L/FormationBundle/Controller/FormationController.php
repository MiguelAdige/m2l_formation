<?php

namespace M2L\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\FormationBundle\Entity\Formation;
use M2L\FormationBundle\Form\Type\FormationType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

class FormationController extends Controller
{
    public function indexAction()
    {
        return $this->render('M2LFormationBundle:Default:index.html.twig');
    }

    public function addAction(Request $request)
    {
    	$Formation = new Formation();
    	$form = $this->get('form.factory')->create(new FormationType(), $Formation);

		if ($request->isMethod("POST")) {
			if ($form->handleRequest($request)) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($Formation);
				$em->flush();

				$this->get('session')->getFlashBag()->add('notice', 'Formation ajouté');
			}
		}


    	return $this->render('M2LFormationBundle:Default:addFormation.html.twig', array('form' => $form->createView()));
    }
}
