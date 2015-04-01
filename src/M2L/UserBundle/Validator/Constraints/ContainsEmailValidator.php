<?php

namespace M2L\UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use M2L\UserBundle\Entity\User;

/**
 * @Annotation
 */
class ContainsEmailValidator extends Constraint
{
    public $message = 'Cette email "%string%" existe déjà.';

    public function validate($value, Constraint $constraint)
    {
    	$doctrine = $this->getDoctrine();
    	$em = $doctrine->getManager();
    	$repo = $em->getRepository('M2LUserBundle:User');

    	$valid = $repo->findByEmail($value);

    	if ($valid === null) {
    		$this->context->addViolation($constraint->message, array('%string%' => $value));
    	}
    }
}