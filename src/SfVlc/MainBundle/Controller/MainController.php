<?php

namespace SfVlc\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
	
    
    /**
     * @Template("SfVlcMainBundle:Main:contacto.html.twig")
     */
	public function contactoAction()
    {
        $peticion = $this->getRequest();
        $form = $this->get("sf_vlc_contact.form")->getContactForm();
        
        if("POST" == $peticion->getMethod()){
            $form->bind($peticion);

            $mensaje = $this->get("sf_vlc_contact.form")->composeMail($form->getData());
            $mailer = $this->get('mailer');
            
            $mailer->send($mensaje);

            $this->get('session')->getFlashBag()->add(
                'info',
                'Tu mensaje se ha enviado correctamente.'
            );
        }
        
        return array(
            "form"=>$form->createView()
        );
	}
    
    
}
