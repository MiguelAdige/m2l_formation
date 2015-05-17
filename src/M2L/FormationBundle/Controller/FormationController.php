<?php

namespace M2L\FormationBundle\Controller;

use M2L\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\FormationBundle\Entity\Formation;
use M2L\FormationBundle\Form\Type\FormationType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

class FormationController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $allFormations = $em->getRepository("M2LFormationBundle:Formation")->findAll();

        return $this->render('M2LFormationBundle:Default:index.html.twig', array(
            "allFormations" =>      $allFormations
            ));
    }

    public function addAction(Request $request)
    {
    	$Formation = new Formation();
    	$form = $this->get('form.factory')->create(new FormationType(), $Formation);

		if ($request->isMethod("POST")) {
			if ($form->handleRequest($request)) {
				$em = $this->getDoctrine()->getManager();
                $Formation->setUser($this->getUser());
//                var_dump($Formation); die();
				$em->persist($Formation);
				$em->flush();

				$this->get('session')->getFlashBag()->add('notice', 'Formation ajouté');
			}
		}


    	return $this->render('M2LFormationBundle:Default:addFormation.html.twig', array('form' => $form->createView()));
    }

    public function viewAction($id) {

        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository("M2LFormationBundle:Formation")->findOneById($id);

        return $this->render("M2LFormationBundle:Default:viewFormation.html.twig", array(
            "formation"   =>  $formation
            ));
    }

    public function listformationsAction()
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

        $user = $this->getUser();

        if ($user != null) {

            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository("M2LUserBundle:User")->find($this->getUser()->getId());

            /*var_dump($user->getFormations()[0]);
            die();*/

            return $this->render("M2LFormationBundle:Default:userFormation.html.twig", array(
                "listeFormation" =>  $user->getFormations()
                ));

        }
    }

    public function addMyFormationAction($id)
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("login"));
        }

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository("M2LFormationBundle:Formation")->findOneById($id);

        $user = $this->getUser();
        $user->addFormation($formation);

        $em->persist($user);

        if(!$em->flush()){
            $this->get('session')->getFlashBag()->add('notice', 'Votre candidature à bien été enregistré.');
        }

        return $this->redirect($this->generateUrl("m2l_formation_view", array('id' => $id)));


    }
}
