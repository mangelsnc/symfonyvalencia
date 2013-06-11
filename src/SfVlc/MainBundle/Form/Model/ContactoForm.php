<?php

namespace SfVlc\MainBundle\Form\Model;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ContactoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nombre","text",array(
                "label"=>"Nombre",
                "required"=>true
            ))
            ->add("email","email",array(
                "label"=>"Email",
                "required"=>true
            ))
            ->add("asunto", "text",array(
                "label"=>"Asunto",
                "required"=>true
            ))
            ->add("mensaje", "textarea",array(
                "label"=>"Mensaje",
                "required"=>true
            ))
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array();
    }
    
    public function getName()
    {
        return "contacto_form";
    }
}
?>