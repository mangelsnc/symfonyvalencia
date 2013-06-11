<?php
namespace SfVlc\MainBundle\Service;

use SfVlc\MainBundle\Form\Model\ContactoForm;
use Symfony\Component\Form\FormFactoryInterface;

class ContactFormManager
{

    protected $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }


    public function getContactForm()
    {
        return $this->formFactory->createBuilder(new ContactoForm())->getForm();
    }
    
    public function composeMail($datos)
    {
        $contenido = sprintf(
            "Remitente: %s \n\nAsunto: %s \n\nMensaje: %s \n",
            $datos['nombre'],
            $datos['asunto'],
            htmlspecialchars($datos['mensaje'])
        );

        $mensaje = \Swift_Message::newInstance()
            ->setSubject('Contacto')
            ->setFrom($datos['email'])
            ->setTo('mangel.snc@gmail.com')
            ->setBody($contenido)
        ;
        
        return $mensaje;
    }
}
?>