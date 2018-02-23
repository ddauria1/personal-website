<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Psr\Log\LoggerInterface;

class MainController extends Controller {

    /**
     * @Route("/")
     *
     */
    public function homepage(LoggerInterface $logger){

        $logger->info("We are logging the homepage");

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
    public function contact(LoggerInterface $logger){

        $logger->info("We are logging the contact page");

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
    public function about(LoggerInterface $logger){

        $logger->info("We are logging the about page");

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
    public function services(LoggerInterface $logger){

        $logger->info("We are logging the services page");

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
    public function marketing(LoggerInterface $logger){

        $logger->info("We are logging the marketing page");

        return $this->render('pages/marketing.html.twig',
            array(
                'title' => 'Online Marketing',
                'mainContent' => 'Content'
            )
        );
    }


}