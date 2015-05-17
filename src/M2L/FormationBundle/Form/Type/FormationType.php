<?php

namespace M2L\FormationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', 'text', array(
            'required'  => true,
            'label'     => false,
            'attr'      => array(
                'placeholder'   => 'Titre de la formation')
        ));
        $builder->add('description', 'textarea', array(
            'label'     => false
        ));
        $builder->add('dateDebut', 'date', array(
            "required"  => true,
            'label'     => false
        ));
        $builder->add('dateFin', 'date', array(
            "required"  => true,
            'label'     => false
        ));
        $builder->add('Publier', 'submit');
    }

    public function getName()
    {
        return '';
    }
}
?>
