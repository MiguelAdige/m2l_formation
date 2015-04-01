<?php

namespace M2L\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array(
            'required'  => true,
            'label'     => false,
            'attr'      => array(
                'placeholder'   => 'Pseudo')
        ));
        $builder->add('password', 'password', array(
            'required'  => true,
            'label'     => false,
            'attr'      => array(
                'placeholder'   => 'Mot de passe')
        ));
        $builder->add('Se connecter', 'submit');
    }

    public function getName()
    {
        return '';
    }
}
?>
