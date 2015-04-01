<?php

namespace M2L\UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use M2L\UserBundle\Entity\User;

/**
 * @Annotation
 */
class ContainsPseudoValidator extends Constraint
{
    public $message = 'Ce Pseudo "%string%" existe déjà.';

    public function validate($value, Constraint $constraint)
    {
    	$doctrine = $this->getDoctrine();
    	$em = $doctrine->getManager();
    	$repo = $em->getRepository('M2LUserBundle:User');

    	$valid = $repo->findByPseudo($value);

    	if ($valid === null) {
    		$this->context->addViolation($constraint->message, array('%string%' => $value));
    	}
    }
}