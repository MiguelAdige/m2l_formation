<?php

namespace M2L\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use M2L\UserBundle\Entity\User;
use M2L\UserBundle\Form\Type\LoginType;
use M2L\UserBundle\Form\Type\UserType;


class UserController extends Controller
{
    public function loginAction()
    {
    	$request = $this->getRequest();
        $session = $request->getSession();

        if($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)){
            $this->get('session')->getFlashBag()->add(
                'notice',
                $session->get(SecurityContext::AUTHENTICATION_ERROR)->getMessage()
            );
        }

        return $this->render('M2LUserBundle:User:login.html.twig', array('pseudo' => $session->get(SecurityContext::LAST_USERNAME)));
    }

    public function inscriptionAction(Request $request)
    {
    	$user = new User();
    	$form = $this->get('form.factory')->create(new UserType(), $user);
    	
    	$form->handleRequest($request);

    	if ($form->isValid()) {
    		$factory = $this->get('security.encoder_factory');

			$encoder = $factory->getEncoder($user);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);

    		$doctrine = $this->getDoctrine();
    		$em = $doctrine->getManager();

    		// Vérification de Pseudo déjà existant
    		$repo = $em->getRepository('M2LUserBundle:User');
			if(!$repo->findByUsername($user->getUsername())){
				// Vérification de mails déjà existant
				if(!$repo->findByUsername($user->getEmail())){
					$em->persist($user);
		    		$em->flush();
		    			
                    $this->get('session')->getFlashBag()->add('notice', 'Inscription validé');
				}
				else{
					$this->get('session')->getFlashBag()->add('notice', 'Adresse Email existante');
				}
			}
			else{
				$this->get('session')->getFlashBag()->add('notice', 'Pseudo existant');
			}
    	}

        return $this->render('M2LUserBundle:User:inscription.html.twig', array('form' => $form->createView()));
    }

    public function editAction(Request $request) {
        $user = $this->getUser();
        $form = $this->get('form.factory')->create(new UserType(), $user);
        
        if ($user != null) {
			if ($request->isMethod("POST")) {
				if ($form->handleRequest($request)) {
					$users = new User();
					$em = $this->getDoctrine()->getManager();
					$users = $em->getRepository("M2LUserBundle:User")->find($user);
					$em->persist($users);
					$em->flush();

					return $this->redirect($this->generateUrl("m2l_profil_edit", array()));
				}
			}

            return $this->render("M2LUserBundle:User:editProfil.html.twig", array(
                "form"  =>  $form->createView(),
                "user"      =>  $user
                ));
        } else {
            return $this->redirect($this->generateUrl("login"));
        }
    }

    public function viewAction($id) {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("M2LUserBundle:User")->find($id);
        return $this->render("M2LUserBundle:User:viewProfil.html.twig", array(
            "user"      =>  $user
            ));
    }
    
}
