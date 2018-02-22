<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainController extends Controller {

    /**
     * @Route("/")
     *
     */
    public function homepage(){
        return $this->render('home.html.twig',
            array(
                'title' => 'Home',
                'mainContent' => 'Content'
            )
        );
    }


    /**
     * @Route("/contact")
     *
     */
    public function contact(){
        return $this->render('pages/contact.html.twig',
            array(
                'title' => 'Contact',
                'mainContent' => 'Content'
            )
        );
    }


    /**
     * @Route("/about")
     *
     */
    public function about(){
        return $this->render('pages/about.html.twig',
            array(
                'title' => 'About',
                'mainContent' => 'Content'
            )
        );
    }


    /**
     * @Route("/services")
     *
     */
    public function services(){
        return $this->render('pages/services.html.twig',
            array(
                'title' => 'Services',
                'mainContent' => 'Content'
            )
        );
    }

    /**
     * @Route("/marketing")
     *
     */
    public function marketing(){
        return $this->render('pages/marketing.html.twig',
            array(
                'title' => 'Online Marketing',
                'mainContent' => 'Content'
            )
        );
    }


}