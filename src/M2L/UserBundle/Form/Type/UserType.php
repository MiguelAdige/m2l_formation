<?php

namespace M2L\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use M2L\UserBundle\Entity\User;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('label' => 'Pseudo'))
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('email', 'email')
            ->add('password', 'password', array('label' => 'Mot de passe'))
            ->add('ddn', 'birthday', array('label' => 'Date de naissance'))
            ->add('ville', 'text')
            ->add('sexe', 'choice', array(
                'choices' => array('m' => 'Masculin', 'f' => 'Féminin'),
                'required' => true,
            ))
            ->add('Enregistrer', 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2L\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'm2l_userbundle_user';
    }
}
