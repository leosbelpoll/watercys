<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    private $mailer;

    // Inyecto el Swift_Mailer para poder usarlo cuando lo necesite
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
    * @Route("/email", name="formContact")
    */
    private function sendEmail($summary, $to, $body)
    {
       $message = (new \Swift_Message($summary))
       ->setFrom(['contacto@watercys.cl' => 'WaterCYS App'])
       ->setTo($to)
       ->setBody($body, 'text/html');

       $this->mailer->send($message);
   }

    /**
    * @Route("/", name="homepage")
    */
    public function index()
    {
        return $this->render('front/home.html.twig');
    }

    /**
    * @Route("/references", name="references")
    */
    public function references()
    {
        return $this->render('front/references.html.twig');
    }

    /**
    * @Route("/contact", name="contact")
    */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }

    /**
    * @Route("/cotization", name="cotization")
    */
    public function cotization()
    {
        $type = $_POST["type"];
        $empresa = $_POST["empresa"];
        $giro = $_POST["giro"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $ciudad = $_POST["ciudad"];
        $comentarios = $_POST["comentarios"];

        $page = $this->renderView('front/cotization.html.twig',[
            'type' => $type,
            'empresa' => $empresa,
            'giro' => $giro,
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'comentarios' => $comentarios,
        ]);
        try {
            $this->sendEmail('Cotización', 'jvillagran@watercys.cl', $page);
            $this->addFlash('success', 'mensaje enviado');
        } catch (\Exception $e) {
            $this->addFlash('error', 'mensaje no enviado');
        }
        return $this->redirect('contact');
    }

    /**
    * @Route("/mision", name="mision")
    */
    public function mision()
    {
        return $this->render('front/mision.html.twig');
    }

    /**
    * @Route("/products", name="products")
    */
    public function products()
    {
        return $this->render('front/products.html.twig');
    }
}

