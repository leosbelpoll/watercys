<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
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
    * @Route("/mision", name="mision")
    */
    public function mision()
    {
        return $this->render('front/mision.html.twig');
    }

    /**
    * @Route("/vision", name="vision")
    */
    public function vision()
    {
        return $this->render('front/vision.html.twig');
    }

    /**
    * @Route("/products", name="products")
    */
    public function products()
    {
        return $this->render('front/products.html.twig');
    }

    /**
    * @Route("/services", name="services")
    */
    public function services()
    {
        return $this->render('front/services.html.twig');
    }
}